<?php

namespace App\Http\Controllers;

use App\ObatTRX;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LaporanController extends Controller
{
    
    public function show(Request $request){

        try {

            $trx = ObatTRX::leftjoin('apoteker', 'apoteker.kodeApoteker','obat_trx.kodeApoteker')->get();
            $arrData    = array();
            $no         = 1;

            foreach($trx as $row){

                $column["trx_id"]          = $row->trx_id;
                $column["trx_tanggal"]     = $row->trx_tanggal;
                $column["trx_nama"]        = $row->trx_nama;
                $column["nm_apoteker"]     = $row->nm_apoteker;
                $column["trx_keterangan"]  = $row->trx_keterangan;
                $arrData[]                 = $column;

                $no++;
            }

            $parsingJSON = array("data" => $arrData);
            return response()->json($parsingJSON);

        } catch (Exception $e) {

            DB::rollback();
            return $e;
            return back()->with('gagal', 'Error! Proses gagal, silahkan dicoba kembali, atau hubungi administrator '. $e->getMessage());
        }
    }
    
    public function show_detil(Request $request)
    {
        try {
            
            $trx = ObatTRX::leftjoin('obat_outs', 'obat_outs.trx_id', 'obat_trx.trx_id')
            ->leftjoin('obats', 'obats.kodeObat', 'obat_outs.kodeObat')
            ->where('obat_trx.trx_id', $request->trx_id)
            ->get(['obat_outs.OutStock', 'obats.*']);
            $arrData    = array();
            $no         = 1;

            foreach($trx as $row){

                $column["kodeObat"]          = $row->kodeObat;
                $column["nm_obat"]           = $row->nm_obat;
                $column["hargaObat"]         = $row->hargaObat;
                $column["tglKedeluarsa"]     = $row->tglKedeluarsa;
                $column["OutStock"]          = $row->OutStock;
                $arrData[]                   = $column;

                $no++;
            }

            $parsingJSON = array("data" => $arrData);
            return response()->json($parsingJSON);

        } catch (Exception $e) {

            DB::rollback();
            return $e;
            return back()->with('gagal', 'Error! Proses gagal, silahkan dicoba kembali, atau hubungi administrator '. $e->getMessage());
        }
    }
    
}
