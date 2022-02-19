<?php

namespace App\Traits;

/**
 *
 */
trait AjaxResponse
{
    public function success($message, $data = [], $code = 200)
    {
        return response([
            'code'    => $code,
            'status'  => TRUE,
            'data'    => $data,
            'message' => $message,
        ], $code);
    }

    public function failure($message, $code = 422)
    {
        return response([
            'code'    => $code,
            'status'  => FALSE,
            'message' => $message,
        ], $code);
    }

    public function dataTableResponse($data)
    {
        return response([
            'data' => $data
        ]);
    }
}
