<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Utils\RsaUtil;
use Illuminate\Http\Request;
use App\Models\BusinessSetting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    protected $headers;

    public function __construct()
    {
        $this->middleware('auth');

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

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $p_orders = Order::where('payment_status', 'paid')->get();
        $up_orders = Order::where('payment_status', 'unpaid')->get();
        return view('admin.home', compact('p_orders','up_orders'));
    }

    public function dobaOrder()
    {
        // session()->flush();
        $order_url = "https://openapi.doba.com/api/order/doba/queryOrder?pageSize=1000&pageNo=1";

        $orderResponse = Http::withHeaders($this->headers)->get($order_url);

        if ($orderResponse->successful()) {
            $orderData = $orderResponse->json();

            if ($orderData['responseCode'] === '000000' && $orderData['businessData'][0]) {
                $orders = $orderData['businessData'][0]['data'];
                //  dd($orders);
                // Calculate total pages

                return view('admin.order.doba', [
                    'orders' => $orders,
                ]);
            } else {
                return response()->json(['error' => 'Unable to fetch response'], $orderData->status());
            }

        } else {
            // Handle unsuccessful response
            $statusCode = $orderResponse->status();
            return response()->json(['error' => 'Unable to fetch orders'], $statusCode);
        }
    }



    public function dobaUnpaidOrder()
    {
        // session()->flush();
        $order_url = "https://openapi.doba.com/api/order/doba/queryOrder?pageSize=100&pageNo=1&status=1";

        $orderResponse = Http::withHeaders($this->headers)->get($order_url);

        if ($orderResponse->successful()) {
            $orderData = $orderResponse->json();

            if ($orderData['responseCode'] === '000000' && $orderData['businessData'][0]) {
                $orders = $orderData['businessData'][0]['data'];
                //  dd($orders);
                // Calculate total pages

                return view('admin.order.doba_unpaid', [
                    'orders' => $orders,
                ]);
            } else {
                return response()->json(['error' => 'Unable to fetch response'], $orderData->status());
            }

        } else {
            // Handle unsuccessful response
            $statusCode = $orderResponse->status();
            return response()->json(['error' => 'Unable to fetch orders'], $statusCode);
        }
    }

    public function dobaOrderDetail($ordBusiId)
    {
        // session()->flush();
        $order_detail_url = "https://openapi.doba.com/api/order/doba/queryOrder?ordBusiId=$ordBusiId";

        $orderResponse = Http::withHeaders($this->headers)->get($order_detail_url);

        if ($orderResponse->successful()) {
            $orderData = $orderResponse->json();
            // dd($orderData);
            if ($orderData['responseCode'] === '000000' && $orderData['businessData'][0]) {
                $order = $orderData['businessData'][0]['data']['orderBatchList'][0];
                // dd($order);
                // Calculate total pages

                return view('admin.order.doba_detail', [
                    'order' => $order,
                ]);
            } else {
                return response()->json(['error' => 'Unable to fetch response'], $orderData->status());
            }

        } else {
            // Handle unsuccessful response
            $statusCode = $orderResponse->status();
            return response()->json(['error' => 'Unable to fetch orders'], $statusCode);
        }
    }

    public function order()
    {
        $orders = Order::latest()->get();
        return view('admin.order.my_order', compact('orders'));
    }

    public function setting()
    {
        $tax = BusinessSetting::where('key', 'tax')->first();

        return view('admin.setting.index', compact('tax'));
        // dd($tax);
    }


    public function updateSetting(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'key' => 'required',
            // Add any additional validation rules if needed
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the BusinessSetting record for the 'tax' key
        $tax = BusinessSetting::where('key', 'tax')->first();

        // Update the value of the tax setting with the value from the form
        $tax->value = $request->input('key');
        $tax->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Tax setting updated successfully');
    }

}
