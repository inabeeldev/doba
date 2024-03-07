<?php

namespace App\Http\Controllers;

use Exception;
use App\Utils\RsaUtil;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DobaController extends Controller
{
    public function someMethod()
    {

        // Define your app key
            $rsaUtil = new RsaUtil();
            $appKey = RsaUtil::appKey;
            $signType = 'rsa2';
            $timestamp = $rsaUtil->getMillisecond();
            // $timestamp = "1610501018721";
            $sign = $rsaUtil->getSign($appKey, RsaUtil::privateKey, $timestamp);
            // dd($timestamp);

        $headers = [
            'Content-type' => 'application/json',
            'appKey' => $appKey,
            'signType' => $signType,
            'timestamp' => $timestamp,
            'sign' => $sign,
        ];

        $response = Http::withHeaders($headers)
                        ->get('https://openapi.doba.com/api/category/doba/list');
        // // $response = Http::withHeaders($headers)
        // //                 ->get('https://openapi.doba.com/api/supplier/doba/list?pageNumber=1&pageSize=20');
        // $response = Http::withHeaders($headers)
        // ->get('https://openapi.doba.com/api/goods/doba/spu/list?catId=BovRVPJymYDO&pageNumber=1&pageSize=10');
        // Get the response body as a string
        $responseBody = $response->getBody()->getContents();

        // Decode the JSON response body into an array
        $responseData = json_decode($responseBody, true);

        // Dump and die to inspect the response data
        dd($responseData);
    }


    public function queryOrder()
    {
        try {
            // Include the RsaUtil class
            include_once app_path('Utils/RsaUtil.php');

            // Define the appKey and other parameters
            $appKey = RsaUtil::appKey;
            $rsaUtil = new RsaUtil();
            $signType = 'rsa2';
            $timestamp = $rsaUtil->getMillisecond();
            $sign = $rsaUtil->getSign($appKey, RsaUtil::privateKey, $timestamp);

            // Set the request headers
            $headers = [
                'Content-type' => 'application/json',
                'appKey' => $appKey,
                'signType' => $signType,
                'timestamp' => $timestamp,
                'sign' => $sign,
            ];

            // Make the HTTP request
            $response = Http::withHeaders($headers)
                            ->get('http://openapi.doba.com/api/category/doba/list');

            // Get the response status code and content
            $statusCode = $response->status();
            $content = $response->body();

            // Output the result
            return response()->json([
                'status' => $statusCode,
                'content' => $content,
            ]);
        } catch (Exception $exception) {
            // Handle any exceptions
            return response()->json([
                'error' => 'An error occurred: ' . $exception->getMessage(),
            ], 500);
        }
    }
}
