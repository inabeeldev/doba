<?php

namespace App\Http\Controllers\api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function createOrder(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'orderNumber' => 'required|string',
            'ordBatchId' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'total_price' => 'required|numeric',
            'telephone' => 'required|string',
            'countryCode' => 'required|string',
            'provinceCode' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'addr1' => 'required|string',
            'addr2' => 'nullable|string',
            'phoneExtension' => 'nullable|string',
            'payment_status' => 'required|string',
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create the order
        $order = Order::create($request->all());

        // Return a success response
        return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
    }

    public function tax()
    {
        $tax = BusinessSetting::where('key', 'tax')->first()->value;
        return response()->json(['tax' => $tax], 200);

    }
}
