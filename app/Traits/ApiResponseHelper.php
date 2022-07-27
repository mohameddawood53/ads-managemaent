<?php

namespace App\Traits;



trait ApiResponseHelper
{

    public function sendError($message, $data = null, $code = 421)
    {

        $body["status"] = "error";
        $body["message"] = $message;
        $body["data"] = $data;
        $body["code"] = $code;

        return Response()->json($body, 200);
    }

    public function sendSuccess($message, $data = null, $code = 200)
    {

        $body["status"] = "success";
        $body["message"] = $message;
        $body["data"] = $data;
        $body["code"] = $code;
        return Response()->json($body, 200);
    }

    public function sendEmptyResponse($message = "no data", $data = null, $code = 204)
    {

        $body["status"] = "success";
        $body["message"] = $message;
        $body["data"] = $data;
        $body["code"] = $code;
        return Response()->json($body, 200);
    }
}
