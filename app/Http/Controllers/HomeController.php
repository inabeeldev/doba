<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Utils\RsaUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        return view('admin.home');
    }

    public function dobaOrder()
    {
        // session()->flush();
        $order_url = "https://openapi.doba.com/api/order/doba/queryOrder?pageSize=10&pageNo=1";

        $orderResponse = Http::withHeaders($this->headers)->get($order_url);

        if ($orderResponse->successful()) {
            $orderData = $orderResponse->json();

            if ($orderData['responseCode'] === '000000' && $orderData['businessData'][0]) {
                $orders = $orderData['businessData'][0]['data'];
                // dd($orders);
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
        $orders = Order::all();
        return view('admin.order.my_order', compact('orders'));

    }
}
