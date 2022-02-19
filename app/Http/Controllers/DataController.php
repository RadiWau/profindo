<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
Use Exception;
use Carbon\Carbon;
use App\Obat;

class DataController extends Controller
{

    public function __construct(){

    }

	// Select Option List Obat
    public function listObat(Request $request){
        try{
            
            $obat = Obat::all();

            $jsonData = "[";
            $i = 0;
            foreach($obat as $data){
                if($i > 0){
                    $jsonData .= ",\r\n";
                }

                $jsonData .= "{\"id\" : \"$data->kodeObat\", \"text\" : \"$data->nm_obat\"}";
                $i++;
            }
            $jsonData .= "]";
            return $jsonData;
        }
        catch (\Exception $e) {

            return response()->json(array("status"=>"gagal", "message"=>"data sedang dalam perbaikan"));
        }

    }
}
