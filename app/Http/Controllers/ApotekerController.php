<?php

namespace App\Http\Controllers;

use App\Apotekers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApotekerController extends Controller
{
    
    public function show(Request $request){

        $apoteker = Apotekers::all();
        $arrData    = array();
        $no         = 1;

        foreach($apoteker as $row){

            $column["no"]               = $no;
            $column["id"]               = $row->id;
            $column["kodeApoteker"]     = $row->kodeApoteker;
            $column["nm_apoteker"]      = $row->nm_apoteker;
            $column["email"]            = $row->email;
            $column["tgl_lahir"]        = $row->tgl_lahir;
			$arrData[]                  = $column;

            $no++;
        }

		$parsingJSON = array("data" => $arrData);
		return response()->json($parsingJSON);
    }
    
    public function add(Request $request)
    {
        try {
            
            $apoteker               = new Apotekers();
            $apoteker->kodeApoteker = "AP".rand(121, 981);
            $apoteker->nm_apoteker  = $request->txt_nm_apoteker;
            $apoteker->email        = $request->txt_email;
            $apoteker->tgl_lahir    = $request->txt_tgl_lahir;
            $apoteker->password     = Hash::make($request->password);
            $apoteker->save();

            return redirect('/apoteker')->with('sukses', 'Proses Berhasil Menambahkan Apoteker');

        } catch (Exception $e) {

            DB::rollback();
            return $e;
            return back()->with('gagal', 'Error! Proses gagal, silahkan dicoba kembali, atau hubungi administrator '. $e->getMessage());
        }
    }

   
    public function edit(Request $request)
    {
        try{

            $updateApoteker = Apotekers::where('kodeApoteker', '=', $request->kodeApoteker)->update(
                array('nm_apoteker' => $request->nm_apoteker, 'tgl_lahir' => $request->tgl_lahir)
            );

            return redirect('/apoteker')->with('sukses', 'Proses Berhasil Merubah Data Apoteker');

        }
        catch (\Exception $e) {

            return redirect('/apoteker')->with('gagal', 'Proses Gagal, Silahkan hubungi administrator');

        }
    }

    
    public function delete(Request $request)
    {
        
        try{

            $deleteApoteker= Apotekers::where('kodeApoteker',$request->kodeApoteker)->delete();

            return response()->json(["status"=>"sukses", "message"=>"Apoteker Berhasil Dihapus"]);
        }
        catch (\Exception $e) {

            return response()->json(["status"=>"gagal", "message"=>"Proses Gagal"]);

        }

    }
}
