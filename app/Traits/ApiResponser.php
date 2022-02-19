<?php

namespace App\Traits;

use http\Env\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponser{

    public $_request;
    public $_response;
    public $_message = 'General Error';
    public $_ack = '05';
    public $_code = 400;
    public $_status = false;
    public $_data = null;
    public $_rules = [];
    public $_userid;

    protected function validationRequest()
    {
        try {
            $validator = Validator::make((array) $this->_request, $this->_rules);
            if ($validator->fails()) {
                $this->_ack = '10';
                $this->_code = 400;
                $this->_message = implode(',', $validator->messages()->all());

                return false;
            }
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    protected function successResponse($data, $message = null, $ack = '00', $code = 200)
    {
        $response = response()->json([
            'status'            => true,
            'code'              => $ack,
            'message'           => $message ?? 'Success',
            'data'              => $data,
        ], $code);
        //$this->logger->saveLogs(request(),$response);
        return $response;
    }

    protected function errorResponse($message = null, $ack = '05', $code = 400, $data = null)
    {
        $response = response()->json([
            'status'            => false,
            'code'              => $ack,
            'message'           => $message,
            'data'              => $data,
        ], $code);
        //$this->logger->saveLogs(request(),$response);
        return $response;
    }

    protected function _output()
    {
        if ($this->_status)
            return $this->successResponse($this->_data, $this->_message);
        else
            return $this->errorResponse($this->_message, $this->_ack, $this->_code, $this->_data);

    }

}
