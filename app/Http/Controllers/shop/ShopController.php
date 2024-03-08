<?php

namespace App\Http\Controllers\shop;

use Exception;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Order;
use App\Utils\RsaUtil;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

class ShopController extends Controller
{

    protected $headers;
    protected $categoryData;

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
        $categoryResponse = Http::withHeaders($this->headers)->get($categories_url);

        if ($categoryResponse->successful()) {
            $this->categoryData = $categoryResponse->json()['businessData']['data'];
        }

        //  dd($this->categoryData);
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
                $randomProducts = array_slice($filteredProducts, 0, 9);

                $productData[] = $randomProducts;
            } else {
                $statusCode = $productResponse->status();
                return response()->json(['error' => 'Unable to fetch products'], $statusCode);
            }
        }
        return view('shop.home', ['categoryData' => $this->categoryData, 'productData' => $productData]);

    }

    public function shop(Request $request)
    {
        $catIds = ['BovRVPJymYDO', 'rEqHbnYtsPDQ', 'rsVMvcojyPbw','riqKbocWNJDZ','AnDbvgoDFcVY','AcvdbgJfYPVN','ZjbtDvoRFcVl','TzVHDqcQaPbO','BpvWbAPOIcqo','BIDHVAPidJbn','AMqQVfPBoYDH','ApDjvTYfcJVh']; // Add more category IDs as needed
        shuffle($catIds); // Shuffle the array of category IDs
        $selectedCatId = array_pop($catIds); // Select one ID at a time from the shuffled array
        $pageSize = 24; // Number of products per page
        $page = $request->query('page', 1);
        $products_url = "https://openapi.doba.com/api/goods/doba/spu/list?catId=$selectedCatId&pageNumber=$page&pageSize=$pageSize&shipFrom=US&shipTo=US";

        $productResponse = Http::withHeaders($this->headers)->get($products_url);
        if ($productResponse->successful()) {
            $responseData = $productResponse->json();

            $products = $responseData['businessData']['data'];
            $totalProducts = $responseData['businessData']['data']['totalQuantity'];

                // Calculate total pages
            $totalPages = ceil($totalProducts / $pageSize);

            return view('shop.shop_page', [
                'categoryData' => $this->categoryData,
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
        $pageSize = 24; // Number of products per page
        $page = $request->query('page', 1);
        $products_url = "https://openapi.doba.com/api/goods/doba/spu/list?catId=$selectedCatId&pageNumber=$page&pageSize=$pageSize&shipFrom=US&shipTo=US";

        $productResponse = Http::withHeaders($this->headers)->get($products_url);
        if ($productResponse->successful()) {
            $responseData = $productResponse->json();

            $products = $responseData['businessData']['data'];
            $totalProducts = $responseData['businessData']['data']['totalQuantity'];

                // Calculate total pages
            $totalPages = ceil($totalProducts / $pageSize);

            return view('shop.trending', [
                'categoryData' => $this->categoryData,
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
        $query = $request->term;


        $products_url = "https://openapi.doba.com/api/goods/doba/spu/list?keyword=$query&pageSize=40&shipFrom=US&shipTo=US";

        $response = Http::withHeaders($this->headers)->get($products_url);

        $productResponse = json_decode($response->getBody(), true);
        $productData = $productResponse['businessData']['data']['goodsList'];

        $titles = collect($productData)->pluck('title');

        return $titles;
    }


    public function search(Request $request)
    {

        $pageSize = 9; // Number of products per page
        $page = $request->query('page', 1);
        $query = $request->input('query');
        $products_url = "https://openapi.doba.com/api/goods/doba/spu/list?keyword=$query&pageNumber=$page&pageSize=$pageSize&shipFrom=US&shipTo=US";

        $productResponse = Http::withHeaders($this->headers)->get($products_url);
        if ($productResponse->successful()) {
            $responseData = $productResponse->json();

            $products = $responseData['businessData']['data'];
            $totalProducts = $responseData['businessData']['data']['totalQuantity'];

                // Calculate total pages
            $totalPages = ceil($totalProducts / $pageSize);

            return view('shop.search_product', [
                'categoryData' => $this->categoryData,
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
        while (empty($this->categoryData)) {
            // Handle case where categoryData is not available
            return response()->json(['error' => 'Oops! Please refresh the page'], 500);
        }
        // while (empty($this->categoryData)) {
        //     usleep(900000); // Sleep for 0.5 seconds
        // }


        // session()->flush();
        $product_url = "https://openapi.doba.com/api/goods/doba/spu/detail?spuId=$spuId";

        $productResponse = Http::withHeaders($this->headers)->get($product_url);

        if ($productResponse->successful()) {
            $productData = $productResponse->json()['businessData']['data'];

            // dd($productData);

            $cateId = $productResponse->json()['businessData']['data'][0]['cateId'];
            $related_products_url = "https://openapi.doba.com/api/goods/doba/spu/list?catId=$cateId&pageNumber=1&pageSize=100";
            $relatedProductResponse = Http::withHeaders($this->headers)->get($related_products_url);
            // dd($productData);
            if ($relatedProductResponse->successful()) {
                $relatedProductsData = $relatedProductResponse->json()['businessData']['data']['goodsList'];
                // dd($relatedProductsData);
                // Shuffle the array to get a random order
                shuffle($relatedProductsData);

                // Take the first 8 elements as random related products
                $randomRelatedProducts = array_slice($relatedProductsData, 0, 8);
            }
            // dd($productData);
            // Pass the product data and random related products to the view
            return view('shop.product_detail', [
                'categoryData' => $this->categoryData,
                'productData' => $productData,
                'randomRelatedProducts' => $randomRelatedProducts ?? [],
            ]);
        } else {
            // Handle unsuccessful response
            $statusCode = $productResponse->status();
            return response()->json(['error' => 'Unable to fetch product detail'], $statusCode);
        }
    }



    public function catProduct(Request $request, $catId, $catName)
    {
        // dd($page);
        $pageSize = 9; // Number of products per page
        $page = $request->query('page', 1);

        $offset = ($page - 1) * $pageSize;

        $url = 'https://openapi.doba.com/api/goods/doba/spu/list?catId=' . $catId . '&pageNumber=' . $page . '&pageSize=' . $pageSize.'&shipFrom=US&shipTo=US';

        $response = Http::withHeaders($this->headers)
                        ->get($url);

        if ($response->successful()) {
            $responseData = $response->json();

            if ($responseData['responseCode'] === '000000' && $responseData['businessData']['successful']) {
                $products = $responseData['businessData']['data'];
                $totalProducts = $responseData['businessData']['data']['totalQuantity'];

                // Calculate total pages
                $totalPages = ceil($totalProducts / $pageSize);

                return view('shop.cat_product', [
                    'categoryData' => $this->categoryData,
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

    $shippingMethodId =  $shipResponseData['businessData'][0]['data']['costs'][0]['shippingMethodId'];


    $itemNo = $request->input('itemNo');
    $quantity = $request->input('quantity');
    // $shippingMethodId = $request->input('shippingMethodId');
    $shippingMethodId = $shippingMethodId;
    $spuId = $request->input('spuId');
    $title = $request->input('title');
    $price = $request->input('price');
    $skuPicList = $request->input('skuPicList');

    // Store data in session
    $request->session()->push('cart', [
        'itemNo' => $itemNo,
        'quantity' => $quantity,
        'shippingMethodId' => $shippingMethodId,
        'spuId' => $spuId,
        'title' => $title,
        'price' => $price,
        'skuPicList' => $skuPicList
    ]);

    return response()->json(['message' => 'Item added to cart successfully.'], 200);
}

    public function cart()
    {
        return view('shop.cart', [
            'categoryData' => $this->categoryData
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
        return view('shop.checkout', [
            'categoryData' => $this->categoryData
        ]);
    }


// public function checkoutStore(Request $request)
// {

//     $billingAddress = $request->input('billingAddress');
//     $requestData = [
//         "shipToCountry" => $billingAddress['countryCode'],
//         "shipToProvince" => $billingAddress['provinceCode'],
//         "shipToCity" => $billingAddress['city'],
//         "shipToZipCode" => $billingAddress['zip'],
//         'goods' => [],
//     ];

//     $cartItems = session('cart', []);
//     foreach ($cartItems as $cartItem) {
//         $requestData['goods'][] = [
//             "itemNo" => $cartItem['itemNo'],
//             "quantity" => $cartItem['quantity']
//         ];
//     }


//     $ship_url = 'https://openapi.doba.com/api/shipping/doba/cost/goods';

//     $response = Http::withHeaders($this->headers) // Assuming $this->headers contains required headers
//     ->post($ship_url, $requestData);

//     $shipResponseData = $response->json(); // Convert response to JSON format
//     $shippingMethodIds = [];
//     foreach ($shipResponseData['businessData'] as $businessDatum) {
//         foreach ($businessDatum['data']['costs'] as $cost) {
//             $shippingMethodIds[] = $cost['shippingMethodId'];
//         }
//     }

//     // dd($shipResponseData);

//     $url = 'https://openapi.doba.com/api/order/doba/importOrder';

//     $billingAddress = $request->input('billingAddress');
//     $cartItems = session('cart', []);

//     $payload = [
//         'billingAddress' => $billingAddress,
//         'openApiImportDSOrderList' => [],
//     ];

//     $uniqueOrders = [];

//     foreach ($cartItems as $cartItem) {
//         $orderKey = md5(json_encode($billingAddress));

//         if (!isset($uniqueOrders[$orderKey])) {
//             $uniqueOrders[$orderKey] = [
//                 'goodsDetailDTOList' => [], // Initialize goodsDetailDTOList for this order
//                 'orderNumber' => date('ymdHis') . mt_rand(100, 999), // Generate a unique order number
//                 'shippingAddress' => $billingAddress, // Assume shipping address is the same as billing address
//                 'storeOrderAmount' => $request->input('storeOrderAmount'), // Total order amount
//                 'storeOrderBusiId' => 2135201,
//             ];
//         }

//         // Use the first shipping method ID from the list
//         $uniqueOrders[$orderKey]['goodsDetailDTOList'][] = [
//             'itemNo' => $cartItem['itemNo'],
//             'quantityOrdered' => $cartItem['quantity'],
//             'shippingMethodId' => isset($shippingMethodIds[0]) ? $shippingMethodIds[0] : null,
//         ];
//     }

//     foreach ($uniqueOrders as $order) {
//         $payload['openApiImportDSOrderList'][] = $order;
//     }
//     // dd($payload);

//     $response = Http::withHeaders($this->headers) // Assuming $this->headers contains required headers
//                     ->post($url, $payload);
//     // dd($response);
//     if ($response->successful()) {
//         $responseData = $response->json(); // Convert response to JSON format


//          dd($responseData);

//         if ($responseData['businessData']['data']['orderSuccessResList']) {
//             foreach ($uniqueOrders as $order) {
//                 Order::create([
//                     'orderNumber' => $responseData['businessData']['data']['orderSuccessResList'][0]['orderNumber'],
//                     'ordBatchId' => $responseData['businessData']['data']['orderSuccessResList'][0]['ordBatchId'], // Adjust this logic as needed
//                     'name' => $order['shippingAddress']['name'],
//                     'email' => 'ahah@example.com',
//                     'telephone' => $order['shippingAddress']['telephone'],
//                     'countryCode' => $order['shippingAddress']['countryCode'],
//                     'provinceCode' => $order['shippingAddress']['provinceCode'],
//                     'city' => $order['shippingAddress']['city'],
//                     'zip' => $order['shippingAddress']['zip'],
//                     'addr1' => $order['shippingAddress']['addr1'],
//                     'addr2' => $order['shippingAddress']['addr2'],
//                     'phoneExtension' => $order['shippingAddress']['phoneExtension'],
//                     'payment_status' => 'unpaid', // Assuming the initial status is unpaid
//                 ]);
//             }

//             return redirect()->route('thank-you-page');
//         }


//     } else {
//         // Request failed, handle the error
//         $errorCode = $response->status(); // Get the HTTP status code
//         $errorMessage = $response->body(); // Get the error message

//         dd($errorCode);
//     }
// }




// public function checkoutStore(Request $request)
// {

//     $validator = Validator::make($request->all(), [
//         'name' => 'required',
//         'email' => 'required|email',
//         'telephone' => 'required',
//         'countryCode' => 'required',
//         'provinceCode' => 'required',
//         'city' => 'required',
//         'zip' => 'required',
//         'addr1' => 'required',
//         'stripeToken' => 'required', // Ensure the stripeToken field is required
//     ]);

//     if ($validator->fails()) {
//         return redirect()->back()
//             ->withErrors($validator)
//             ->withInput();
//     }

//     $url = 'https://openapi.doba.com/api/order/doba/importOrder';

//     $billingAddress = $request->input('billingAddress');
//     $cartItems = session('cart', []);

//     $payload = [
//         'billingAddress' => $billingAddress,
//         'openApiImportDSOrderList' => [],
//     ];

//     $uniqueOrders = [];

//     foreach ($cartItems as $cartItem) {
//         $orderKey = md5(json_encode($billingAddress));

//         if (!isset($uniqueOrders[$orderKey])) {
//             $uniqueOrders[$orderKey] = [
//                 'goodsDetailDTOList' => [], // Initialize goodsDetailDTOList for this order
//                 'orderNumber' => date('ymdHis') . mt_rand(100, 999), // Generate a unique order number
//                 'shippingAddress' => $billingAddress, // Assume shipping address is the same as billing address
//                 'storeOrderAmount' => $request->input('storeOrderAmount'), // Total order amount
//                 'storeOrderBusiId' => 2135201,
//             ];
//         }

//         // Use the first shipping method ID from the list
//         $uniqueOrders[$orderKey]['goodsDetailDTOList'][] = [
//             'itemNo' => $cartItem['itemNo'],
//             'quantityOrdered' => $cartItem['quantity'],
//             'shippingMethodId' => $cartItem['shippingMethodId'],
//         ];
//     }

//     foreach ($uniqueOrders as $order) {
//         $payload['openApiImportDSOrderList'][] = $order;
//     }

//     Stripe::setApiKey(config('services.stripe.secret'));

//     $charge = Charge::create([
//         'amount' => $request->input('storeOrderAmount') * 100, // Amount in cents
//         'currency' => 'usd',
//         'description' => 'Example charge',
//         'source' => $request->stripeToken,
//     ]);


//     $response = Http::withHeaders($this->headers) // Assuming $this->headers contains required headers
//                     ->post($url, $payload);

//     if ($response->successful()) {
//         $responseData = $response->json(); // Convert response to JSON format

//         if ($responseData['businessData']['data']['orderSuccessResList']) {
//             foreach ($uniqueOrders as $order) {
//                 Order::create([
//                     'orderNumber' => $responseData['businessData']['data']['orderSuccessResList'][0]['orderNumber'],
//                     'ordBatchId' => $responseData['businessData']['data']['orderSuccessResList'][0]['ordBatchId'], // Adjust this logic as needed
//                     'name' => $order['shippingAddress']['name'],
//                     'email' => $request->email,
//                     'telephone' => $order['shippingAddress']['telephone'],
//                     'countryCode' => $order['shippingAddress']['countryCode'],
//                     'provinceCode' => $order['shippingAddress']['provinceCode'],
//                     'city' => $order['shippingAddress']['city'],
//                     'zip' => $order['shippingAddress']['zip'],
//                     'addr1' => $order['shippingAddress']['addr1'],
//                     'addr2' => $order['shippingAddress']['addr2'],
//                     'phoneExtension' => $order['shippingAddress']['phoneExtension'],
//                     'payment_status' => 'unpaid', // Assuming the initial status is unpaid
//                 ]);
//             }

//             return redirect()->route('thank-you-page');
//         }

//     } else {
//         $errorCode = $response->status(); // Get the HTTP status code
//         $errorMessage = $response->body(); // Get the error message

//         dd($errorCode);
//     }
// }



public function checkoutStore(Request $request)
{
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
                            'telephone' => $order['shippingAddress']['telephone'],
                            'countryCode' => $order['shippingAddress']['countryCode'],
                            'provinceCode' => $order['shippingAddress']['provinceCode'],
                            'city' => $order['shippingAddress']['city'],
                            'zip' => $order['shippingAddress']['zip'],
                            'addr1' => $order['shippingAddress']['addr1'],
                            'addr2' => $order['shippingAddress']['addr2'],
                            'phoneExtension' => $order['shippingAddress']['phoneExtension'],
                            'payment_status' => 'unpaid', // Assuming the initial status is unpaid
                        ]);
                    }

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

        $url = 'https://openapi.doba.com/api/goods/doba/spu/list?pageNumber=1&pageSize=12&shipFrom=US&shipTo=US';

        $response = Http::withHeaders($this->headers)
                        ->get($url);

        if ($response->successful()) {
            $responseData = $response->json();

            if ($responseData['responseCode'] === '000000' && $responseData['businessData']['successful']) {
                $products = $responseData['businessData']['data'];


                return view('shop.thank_you', [
                    'categoryData' => $this->categoryData,
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




}
