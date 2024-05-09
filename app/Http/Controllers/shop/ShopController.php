<?php

namespace App\Http\Controllers\shop;

use Exception;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\City;
use App\Models\Order;
use App\Models\State;
use App\Utils\RsaUtil;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\BusinessSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

class ShopController extends Controller
{

    protected $headers;
    // protected $categoryData;

    public function __construct()
    {
        $rsaUtil = new RsaUtil();
        $appKey = RsaUtil::appKey;
        $signType = 'rsa2';
        $timestamp = $rsaUtil->getMillisecond();
        $sign = $rsaUtil->getSign($appKey, RsaUtil::privateKey, $timestamp);

        $this->headers = [
            'Content-type' => 'application/json',
            'appKey' => $appKey,
            'signType' => $signType,
            'timestamp' => $timestamp,
            'sign' => $sign,
        ];

        $categories_url = 'https://openapi.doba.com/api/category/doba/list';

        $categoryData = retry(5, function () use ($categories_url) {
            $categoryResponse = Http::withHeaders($this->headers)->get($categories_url);

            if ($categoryResponse->successful()) {
                return $categoryResponse->json()['businessData']['data'];
            } else {
                throw new Exception("Failed to retrieve category data from API.");
            }
        }, 1000); // Retry up to 5 times, with a delay of 1000 milliseconds (1 second) between retries

        View::share('categoryData', $categoryData);

    }

    public function home(Request $request)
    {

        $catIds = ['BovRVPJymYDO', 'rEqHbnYtsPDQ', 'rsVMvcojyPbw','riqKbocWNJDZ','AnDbvgoDFcVY']; // Add more category IDs as needed
        $catIds2 = ['AcvdbgJfYPVN','ZjbtDvoRFcVl','TzVHDqcQaPbO','BpvWbAPOIcqo','BIDHVAPidJbn']; // Add more category IDs as needed
        shuffle($catIds); // Shuffle the array of category IDs
        shuffle($catIds2); // Shuffle the array of category IDs
        $selectedCatId = array_pop($catIds); // Select one ID at a time from the shuffled array
        $selectedCatId2 = array_pop($catIds2); // Select one ID at a time from the shuffled array

        $products_urls = [
        "https://openapi.doba.com/api/goods/doba/spu/list?catId=$selectedCatId&pageNumber=1&pageSize=100&shipFrom=US&shipTo=US",
        "https://openapi.doba.com/api/goods/doba/spu/list?catId=WCVZbTPQFYDi&pageNumber=1&pageSize=100&shipFrom=US&shipTo=US",
        "https://openapi.doba.com/api/goods/doba/spu/list?catId=rnvgbAYilcDw&pageNumber=1&pageSize=100&shipFrom=US&shipTo=US",
        "https://openapi.doba.com/api/goods/doba/spu/list?catId=$selectedCatId2&pageNumber=1&pageSize=100&shipFrom=US&shipTo=US",
        ];

        $productData = [];

        // for timer products
        $p_url = "https://openapi.doba.com/api/goods/doba/spu/list?catId=$selectedCatId&pageNumber=1&pageSize=50&shipFrom=US&shipTo=US";
        $pResponse = Http::withHeaders($this->headers)->get($p_url);

        // Check if the API request was successful
        if ($pResponse->successful()) {
            // Extract the response data
            $responseData2 = $pResponse->json();

            // Extract the products list
            $products2 = $responseData2['businessData']['data']['goodsList'];

            // Filter products with inventory greater than 0 and limit to 4 items
            $products2 = array_filter($products2, function ($product) {
                return $product['inventory'] > 0;
            });

            // Slice the array to get at most 4 products with inventory greater than 0
            $products2 = array_slice($products2, 0, 4);

            // Output the filtered products
            // dd($filteredProducts);
        }

        // timer products end

        foreach ($products_urls as $products_url) {
            $productResponse = Http::withHeaders($this->headers)->get($products_url);

            if ($productResponse->successful()) {
                $allProducts = $productResponse->json()['businessData']['data']['goodsList'];

                // Shuffle the array to get a random order
                shuffle($allProducts);

                $filteredProducts = array_filter($allProducts, function($product) {
                    return $product['inventory'] > 0;
                });

                // Take the first 10 elements as random products
                $randomProducts = array_slice($filteredProducts, 0, 12);

                $productData[] = $randomProducts;
            } else {
                $statusCode = $productResponse->status();
                return response()->json(['error' => 'Unable to fetch products'], $statusCode);
            }
        }
        return view('shop.home', ['productData' => $productData , 'products2' => $products2]);

    }

    public function shop(Request $request)
    {


        $catIds = ['BovRVPJymYDO', 'rEqHbnYtsPDQ', 'rsVMvcojyPbw','riqKbocWNJDZ','AnDbvgoDFcVY','AcvdbgJfYPVN','ZjbtDvoRFcVl','TzVHDqcQaPbO','BpvWbAPOIcqo','BIDHVAPidJbn','AMqQVfPBoYDH','ApDjvTYfcJVh']; // Add more category IDs as needed
        shuffle($catIds); // Shuffle the array of category IDs
        $selectedCatId = array_pop($catIds); // Select one ID at a time from the shuffled array
        $pageSize = 32; // Number of products per page
        $page = $request->query('page', 1);
        $products_url = "https://openapi.doba.com/api/goods/doba/spu/list?catId=$selectedCatId&pageNumber=$page&pageSize=$pageSize&shipFrom=US&shipTo=US";

        $productResponse = Http::withHeaders($this->headers)->get($products_url);
        if ($productResponse->successful()) {
            $responseData = $productResponse->json();

            $products = $responseData['businessData']['data']['goodsList'];
            $totalProducts = $responseData['businessData']['data']['totalQuantity'];

            $products = array_filter($products, function ($product) {
                return $product['inventory'] > 0;
            });
                // Calculate total pages
            $totalPages = ceil($totalProducts / $pageSize);
            // dd($products);
            return view('shop.shop_page', [
                'productData' => [
                    'currentPage' => $page,
                    'totalPages' => $totalPages,
                ],
                'products' => $products,
            ]);
        } else {
            // Handle unsuccessful response
            $statusCode = $productResponse->status();
            return response()->json(['error' => 'Unable to fetch product detail'], $statusCode);
        }


        return view('shop.shop_page', compact('products'));
    }

    public function trending(Request $request)
    {

        $catIds = ['ACDebtYQyoqZ', 'ruqPDMoqcYVS', 'WAbcVOJQoYDN','gdVvqkPtEJbK','rKvSDFctCoVA','rvVgDeoYKPbZ','AzVrqFYQeovL','TzVHDqcQaPbO','geVDqCYMrobh','gzVZDkPcfcqd','AMqQVfPBoYDH','ApDjvTYfcJVh']; // Add more category IDs as needed
        shuffle($catIds); // Shuffle the array of category IDs
        $selectedCatId = array_pop($catIds); // Select one ID at a time from the shuffled array
        $pageSize = 32; // Number of products per page
        $page = $request->query('page', 1);
        $products_url = "https://openapi.doba.com/api/goods/doba/spu/list?catId=$selectedCatId&pageNumber=$page&pageSize=$pageSize&shipFrom=US&shipTo=US";

        $productResponse = Http::withHeaders($this->headers)->get($products_url);
        if ($productResponse->successful()) {
            $responseData = $productResponse->json();

            $products = $responseData['businessData']['data']['goodsList'];
            $totalProducts = $responseData['businessData']['data']['totalQuantity'];


            $products = array_filter($products, function ($product) {
                return $product['inventory'] > 0;
            });
                // Calculate total pages
            $totalPages = ceil($totalProducts / $pageSize);

            return view('shop.trending', [
                'productData' => [
                    'currentPage' => $page,
                    'totalPages' => $totalPages,
                ],
                'products' => $products,
            ]);
        } else {
            // Handle unsuccessful response
            $statusCode = $productResponse->status();
            return response()->json(['error' => 'Unable to fetch product detail'], $statusCode);
        }


        return view('shop.trending', compact('products'));
    }


    public function autocomplete(Request $request)
    {
        $query = $request->input('term');

        $products_url = "https://openapi.doba.com/api/goods/doba/spu/list?keyword=$query&pageSize=8&shipFrom=US&shipTo=US";

        $response = Http::withHeaders($this->headers)->get($products_url);

        $productResponse = json_decode($response->getBody(), true);
        $productData = $productResponse['businessData']['data']['goodsList'];

        $suggestions = [];
        foreach ($productData as $product) {
            $suggestions[] = [
                'title' => $product['title'],
                'image' => $product['pictureUrl'], // Assuming 'mainImage' contains the URL of the main product image
            ];
        }

        return response()->json($suggestions);
    }


    public function search(Request $request)
    {


        $pageSize = 32; // Number of products per page
        $page = $request->query('page', 1);
        $query = $request->input('query');
        $products_url = "https://openapi.doba.com/api/goods/doba/spu/list?keyword=$query&pageNumber=$page&pageSize=$pageSize&shipFrom=US&shipTo=US";

        $productResponse = Http::withHeaders($this->headers)->get($products_url);
        if ($productResponse->successful()) {
            $responseData = $productResponse->json();

            $products = $responseData['businessData']['data']['goodsList'];
            $totalProducts = $responseData['businessData']['data']['totalQuantity'];


            $products = array_filter($products, function ($product) {
                return $product['inventory'] > 0;
            });
                // Calculate total pages
            $totalPages = ceil($totalProducts / $pageSize);

            return view('shop.search_product', [
                'productData' => [
                    'currentPage' => $page,
                    'totalPages' => $totalPages,
                ],
                'products' => $products,
                'query' => $query,
            ]);
        } else {
            // Handle unsuccessful response
            $statusCode = $productResponse->status();
            return response()->json(['error' => 'Unable to fetch product detail'], $statusCode);
        }


        return view('shop.search_product', compact('products','query'));
    }



    public function productDetail($spuId)
    {
        // session()->flush();
        $product_url = "https://openapi.doba.com/api/goods/doba/spu/detail?spuId=$spuId";

        $productResponse = Http::withHeaders($this->headers)->get($product_url);

        if ($productResponse->successful()) {
            $productData = $productResponse->json()['businessData']['data'];
            $selectedItemNo = $productData[0]['children'][0]['stocks'][0]['itemNo'];
            //   dd($productData);

            $cateId = $productResponse->json()['businessData']['data'][0]['cateId'];
            $related_products_url = "https://openapi.doba.com/api/goods/doba/spu/list?catId=$cateId&pageNumber=1&pageSize=100";
            $relatedProductResponse = Http::withHeaders($this->headers)->get($related_products_url);
            // dd($productData);
            if ($relatedProductResponse->successful()) {
                $relatedProductsData = $relatedProductResponse->json()['businessData']['data']['goodsList'];
                // dd($relatedProductsData);


                $relatedProductsData = array_filter($relatedProductsData, function ($product) {
                    return $product['inventory'] > 0;
                });
                // dd($relatedProductsData);
                // Shuffle the array to get a random order
                shuffle($relatedProductsData);

                // Take the first 8 elements as random related products
                $randomRelatedProducts = array_slice($relatedProductsData, 0, 16);
                // dd($randomRelatedProducts);
            }
            $randomReviews = $this->getRandomReviews();
            // dd($productData);
            // Pass the product data and random related products to the view
            return view('shop.product_detail', [
                'productData' => $productData,
                'randomRelatedProducts' => $randomRelatedProducts ?? [],
                'randomReviews' => $randomReviews,
                'selectedItemNo' => $selectedItemNo,
            ]);
        } else {
            // Handle unsuccessful response
            $statusCode = $productResponse->status();
            return response()->json(['error' => 'Unable to fetch product detail'], $statusCode);
        }
    }


    private function getRandomReviews()
    {
        // Static review data
        $staticReviews = [
            [
                'name' => 'Brandon Kelley',
                'date' => '12 Mar 2024',
                'rating' => 5,
                'comment' => 'Nice Product!'
            ],
            [
                'name' => 'Roy Banks',
                'date' => '27 Feb 2024',
                'rating' => 5,
                'comment' => 'Nice and exellent!'
            ],

            [
                'name' => 'Jason muller',
                'date' => '25 Jan 2024',
                'rating' => 5,
                'comment' => 'This is a good product.'
            ],

            [
                'name' => 'mike jason',
                'date' => '05 Mar 2024',
                'rating' => 5,
                'comment' => 'I really liked this product.'
            ],

            [
                'name' => 'Larnyoh mike',
                'date' => '09 Feb 2024',
                'rating' => 5,
                'comment' => 'Amazing Product!'
            ],

            [
                'name' => 'Joseph john',
                'date' => '19 Feb 2024',
                'rating' => 5,
                'comment' => 'Thank you for this wonderful piece of product.'
            ],

            [
                'name' => 'Sheila Roy',
                'date' => '12 Mar 2024',
                'rating' => 5,
                'comment' => 'Fast delivery and amazing item!'
            ],

            [
                'name' => 'Taylor bell',
                'date' => '08 Mar 2024',
                'rating' => 5,
                'comment' => 'I love this product and Naturecheckout service.'
            ],
            // Add more static reviews if needed
        ];

        // Shuffle the array to get a random order
        shuffle($staticReviews);

        // Take only the first 2 reviews
        $randomReviews = array_slice($staticReviews, 0, 2);

        return $randomReviews;
    }



    public function catProduct(Request $request, $catId, $catName)
    {

        $pageSize = 32; // Number of products per page
        $page = $request->query('page', 1);

        $offset = ($page - 1) * $pageSize;

        $url = 'https://openapi.doba.com/api/goods/doba/spu/list?catId=' . $catId . '&pageNumber=' . $page . '&pageSize=' . $pageSize.'&shipFrom=US&shipTo=US';

        $response = Http::withHeaders($this->headers)
                        ->get($url);

        if ($response->successful()) {
            $responseData = $response->json();

            if ($responseData['responseCode'] === '000000' && $responseData['businessData']['successful']) {
                $products = $responseData['businessData']['data']['goodsList'];
                $totalProducts = $responseData['businessData']['data']['totalQuantity'];

                $products = array_filter($products, function ($product) {
                    return $product['inventory'] > 0;
                });

                // Calculate total pages
                $totalPages = ceil($totalProducts / $pageSize);

                return view('shop.cat_product', [
                    'productData' => [
                        'currentPage' => $page,
                        'totalPages' => $totalPages,
                    ],
                    'products' => $products,
                    'catName' => $catName,
                    'catId' => $catId,
                ]);
            } else {
                return response()->json(['error' => 'Unable to fetch response'], $response->status());
            }
        } else {
            return response()->json(['error' => 'Unable to fetch response'], $response->status());
        }
    }


    public function addToCart(Request $request)
    {
        // dd($request->all());
        $tax = BusinessSetting::where('key', 'tax')->first()->value;

        $requestData = [
            "shipToCountry" => 'US',
            'goods' => [
                [
                    "itemNo" => $request->input('itemNo'),
                    "quantity" => $request->input('quantity')
                ]

            ],
        ];


        $ship_url = 'https://openapi.doba.com/api/shipping/doba/cost/goods';

        $response = Http::withHeaders($this->headers) // Assuming $this->headers contains required headers
        ->post($ship_url, $requestData);

        $shipResponseData = $response->json(); // Convert response to JSON format
        // dd($shipResponseData);

        // Extract shipping method ID and shipping fee
        $shippingMethodId =  $shipResponseData['businessData'][0]['data']['costs'][0]['shippingMethodId'];
        $shipFee = $shipResponseData['businessData'][0]['data']['costs'][0]['shipFee'];


        $itemNo = $request->input('itemNo');
        $quantity = $request->input('quantity');
        // $shippingMethodId = $request->input('shippingMethodId'); // Removed redundant line
        $shippingMethodId = $shippingMethodId;
        $spuId = $request->input('spuId');
        $title = $request->input('title');
        $price = $request->input('price');
        $skuPicList = $request->input('skuPicList');

        $taxAmount = ($price * $quantity) * ($tax / 100);

        // Store data in session, including shipFee
        $request->session()->push('cart', [
            'itemNo' => $itemNo,
            'quantity' => $quantity,
            'shippingMethodId' => $shippingMethodId,
            'shipFee' => $shipFee, // Include shipFee in the cart data
            'spuId' => $spuId,
            'title' => $title,
            'price' => $price,
            'tax' => $taxAmount,
            'skuPicList' => $skuPicList
        ]);

        return response()->json(['message' => 'Item added to cart successfully.'], 200);
    }

    public function cart()
    {

        $catIds2 = ['AcvdbgJfYPVN','ZjbtDvoRFcVl','TzVHDqcQaPbO','BpvWbAPOIcqo','BIDHVAPidJbn']; // Add more category IDs as needed
        shuffle($catIds2); // Shuffle the array of category IDs
        $selectedCatId2 = array_pop($catIds2); // Select one ID at a time from the shuffled array
        $p_url = "https://openapi.doba.com/api/goods/doba/spu/list?catId=$selectedCatId2&pageNumber=1&pageSize=12&shipFrom=US&shipTo=US";
        $pResponse = Http::withHeaders($this->headers)->get($p_url);
        if ($pResponse->successful()) {
            $responseData2 = $pResponse->json();

            $products2 = $responseData2['businessData']['data']['goodsList'];
        }
        return view('shop.cart', [
            'products2' => $products2
        ]);
    }


    public function updateCartItem(Request $request)
    {

        $itemNo = $request->input('itemNo');
        $quantity = $request->input('quantity');

        // Get the current cart items from the session
        $cart = Session::get('cart', []);

        // Find the item in the cart
        foreach ($cart as &$item) {
            if ($item['itemNo'] == $itemNo) {
                // Update the quantity
                $item['quantity'] = $quantity;
                break;
            }
        }

        // Save the updated cart back to the session
        Session::put('cart', $cart);

        return response()->json(['message' => 'Cart item updated successfully.']);
    }

    public function removeCartItem(Request $request)
    {


        $itemNo = $request->input('itemNo');

        // Get the current cart items from the session
        $cart = Session::get('cart', []);

        // Remove the item from the cart
        $cart = array_filter($cart, function ($item) use ($itemNo) {
            return $item['itemNo'] != $itemNo;
        });

        // Save the updated cart back to the session
        Session::put('cart', $cart);

        return response()->json(['message' => 'Cart item removed successfully.']);
    }


    public function checkoutPage()
    {
        $states = State::all();
        return view('shop.checkout', compact('states'));
    }


    public function checkoutStore(Request $request)
    {
        // dd($request->all());
        try {
            $validator = Validator::make($request->all(), [
                'billingAddress.name' => 'required',
                'email' => 'required|email',
                'billingAddress.telephone' => 'required',
                'billingAddress.countryCode' => 'required',
                'billingAddress.provinceCode' => 'required',
                'billingAddress.city' => 'required',
                'billingAddress.zip' => 'required',
                'billingAddress.addr1' => 'required',
                'stripeToken' => 'required', // Ensure the stripeToken field is required
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            Stripe::setApiKey(config('services.stripe.secret'));

            $charge = Charge::create([
                'amount' => $request->input('storeOrderAmount') * 100, // Amount in cents
                'currency' => 'usd',
                'description' => 'Example charge',
                'source' => $request->stripeToken,
            ]);

            if ($charge->status === 'succeeded') {
                // Stripe charge successful, proceed with the post API call
                $url = 'https://openapi.doba.com/api/order/doba/importOrder';
                $billingAddress = $request->input('billingAddress');
                $cartItems = session('cart', []);
                $payload = [
                    'billingAddress' => $billingAddress,
                    'openApiImportDSOrderList' => [],
                ];
                $uniqueOrders = [];

                foreach ($cartItems as $cartItem) {
                    $orderKey = md5(json_encode($billingAddress));

                    if (!isset($uniqueOrders[$orderKey])) {
                        $uniqueOrders[$orderKey] = [
                            'goodsDetailDTOList' => [], // Initialize goodsDetailDTOList for this order
                            'orderNumber' => date('ymdHis') . mt_rand(100, 999), // Generate a unique order number
                            'shippingAddress' => $billingAddress, // Assume shipping address is the same as billing address
                            'storeOrderAmount' => $request->input('storeOrderAmount'), // Total order amount
                            'storeOrderBusiId' => 2135201,
                        ];
                    }

                    // Use the first shipping method ID from the list
                    $uniqueOrders[$orderKey]['goodsDetailDTOList'][] = [
                        'itemNo' => $cartItem['itemNo'],
                        'quantityOrdered' => $cartItem['quantity'],
                        'shippingMethodId' => $cartItem['shippingMethodId'],
                    ];
                }

                foreach ($uniqueOrders as $order) {
                    $payload['openApiImportDSOrderList'][] = $order;
                }

                // $payloadJson = json_encode($payload, JSON_PRETTY_PRINT);

                // // Output the JSON
                // echo $payloadJson;

                // die;
                $response = Http::withHeaders($this->headers) // Assuming $this->headers contains required headers
                                ->post($url, $payload);

                if ($response->successful()) {
                    $responseData = $response->json(); // Convert response to JSON format
                    // dd($responseData);
                    if ($responseData['businessData']['data']['orderSuccessResList']) {
                        foreach ($uniqueOrders as $order) {
                            Order::create([
                                'orderNumber' => $responseData['businessData']['data']['orderSuccessResList'][0]['orderNumber'],
                                'ordBatchId' => $responseData['businessData']['data']['orderSuccessResList'][0]['ordBatchId'], // Adjust this logic as needed
                                'name' => $order['shippingAddress']['name'],
                                'email' => $request->email,
                                'total_price' => $request->storeOrderAmount,
                                'telephone' => $order['shippingAddress']['telephone'],
                                'countryCode' => $order['shippingAddress']['countryCode'],
                                'provinceCode' => $order['shippingAddress']['provinceCode'],
                                'city' => $order['shippingAddress']['city'],
                                'zip' => $order['shippingAddress']['zip'],
                                'addr1' => $order['shippingAddress']['addr1'],
                                'addr2' => $order['shippingAddress']['addr2'],
                                'phoneExtension' => $order['shippingAddress']['phoneExtension'],
                                'payment_status' => 'paid', // Assuming the initial status is unpaid
                            ]);
                        }
                        session()->forget('cart');
                        return redirect()->route('thank-you-page');
                    }

                } else {
                    $errorCode = $response->status(); // Get the HTTP status code
                    $errorMessage = $response->body(); // Get the error message

                    dd($errorCode);
                }
            } else {
                // Handle unsuccessful Stripe charge
                return redirect()->back()->withErrors(['stripe_error' => 'Stripe charge failed.'])->withInput();
            }
        } catch (Exception $e) {
            // Handle any exceptions that occur during the process
            dd($e->getMessage());
        }
    }





    public function thankYou()
    {
        // return view('thank_you');
        // dd($page);

        $url = 'https://openapi.doba.com/api/goods/doba/spu/list?pageNumber=1&pageSize=24&shipFrom=US&shipTo=US';

        $response = Http::withHeaders($this->headers)
                        ->get($url);

        if ($response->successful()) {
            $responseData = $response->json();

            if ($responseData['responseCode'] === '000000' && $responseData['businessData']['successful']) {
                $products = $responseData['businessData']['data']['goodsList'];

                $products = array_filter($products, function ($product) {
                    return $product['inventory'] > 0;
                });
                return view('shop.thank_you', [
                    'products' => $products,
                ]);
            } else {
                return response()->json(['error' => 'Unable to fetch response'], $response->status());
            }
        } else {
            return response()->json(['error' => 'Unable to fetch response'], $response->status());
        }
    }

    public function ship()
    {
        $url = 'https://openapi.doba.com/api/ship/list';

        $response = Http::withHeaders($this->headers)
                        ->get($url);

        if ($response->successful()) {
            $responseData = $response->json();
            dd($responseData);

        } else {
            return response()->json(['error' => 'Unable to fetch response'], $response->status());
        }
    }

    public function privacy()
    {
        return view('shop.privacy');
    }

    public function terms()
    {
        return view('shop.terms');
    }

    public function error()
    {
        return view('shop.404');
    }

    public function getCities($stateCode) {
        $state = State::where('code', $stateCode)->first();
        if($state) {
            $cities = City::where('state_id', $state->id)->get();
            return response()->json($cities);
        } else {
            return response()->json([]);
        }
    }


}
