<?php


namespace App\Http\Controllers;


class ResponseFormatter
{
    protected static $response = [
      'meta' => [
          'code' => 200,
          'status' => 'success',
          'message' => null
      ],
        'data' => null
    ];

    public static function sucess($data = null, $message = null)
    {
        ResponseFormatter::$response['meta']['message'] = $message;
        ResponseFormatter::$response['data'] = $data;

        return response()->json(ResponseFormatter::$response, ResponseFormatter::$response['meta']['code']);
    }

    public static function error($data = null, $message = null, $code = 400)
    {
        ResponseFormatter::$response['meta']['status'] = 'error';
        ResponseFormatter::$response['meta']['code'] = $code;
        ResponseFormatter::$response['meta']['message'] = $message;
        ResponseFormatter::$response['data'] = $data;

        return response()->json(ResponseFormatter::$response, ResponseFormatter::$response['meta']['code']);
    }
}
