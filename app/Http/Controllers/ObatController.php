<?php

namespace App\Http\Controllers;

use App\Obat;
use App\ObatOut;
use App\ObatTRX;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ObatController extends Controller
{
    
    public function show(Request $request){

        $obat = Obat::all();
        $arrData    = array();
        $no         = 1;

        foreach($obat as $row){

            $column["no"]               = $no;
            $column["id"]               = $row->id;
            $column["kodeObat"]         = $row->kodeObat;
            $column["nm_obat"]          = $row->nm_obat;
            $column["hargaObat"]        = $row->hargaObat;
            $column["stockObat"]        = $row->stockObat;
            $column["tglKedeluarsa"]    = $row->tglKedeluarsa;
			$arrData[]                  = $column;

            $no++;
        }

		$parsingJSON = array("data" => $arrData);
		return response()->json($parsingJSON);
    }
    
    public function add(Request $request)
    {
        try {

            $obat               = new Obat();
            $obat->kodeObat     = "CM".rand(121, 9811);
            $obat->nm_obat      = $request->txt_nm_obat;
            $obat->hargaObat    = $request->txt_harga_obat;
            $obat->stockObat    = $request->txt_stock_obat;
            $obat->tglKedeluarsa= $request->txt_tgl_kedeluarsa;;
            $obat->save();

            return redirect('/obat')->with('sukses', 'Proses Berhasil Menambahkan Obat');

        } catch (Exception $e) {

            DB::rollback();
            return back()->with('gagal', 'Error! Proses gagal, silahkan dicoba kembali, atau hubungi administrator '. $e->getMessage());
        }
    }

   
    public function edit(Request $request)
    {
        try{

            $updateObat = Obat::where('kodeObat', '=', $request->kd_obat)->update(
                array('nm_obat' => $request->nm_obat,'hargaObat' => $request->harga_obat, 'tglKedeluarsa' => $request->tgl_kedeluarsa)
            );

            return redirect('/obat')->with('sukses', 'Proses Berhasil Merubah Data Obat');

        }
        catch (\Exception $e) {

            return redirect('/obat')->with('gagal', 'Proses Gagal, Silahkan hubungi administrator');

        }
    }

    
    public function delete(Request $request)
    {
        
        try{

            $deleteObat= Obat::where('kodeObat',$request->kodeObat)->delete();

            return response()->json(["status"=>"sukses", "message"=>"Obat Berhasil Dihapus"]);
        }
        catch (\Exception $e) {

            return response()->json(["status"=>"gagal", "message"=>"Proses Gagal"]);

        }

    }


    public function trx_add(Request $request)
    {
        try {

            $trx_id                = "TRX".rand(121, 9811);
            $obatTRX               = new ObatTRX();
            $obatTRX->trx_id       = $trx_id;
            $obatTRX->kodeApoteker = session('kdApoteker');
            $obatTRX->trx_tanggal  = date('Y-m-d');
            $obatTRX->trx_nama        = $request->txt_nm_trx;
            $obatTRX->trx_keterangan  = $request->txt_keterangan;
            $obatTRX->save();

            for($i=0; $i<count($request->txt_obat); $i++){
                

                $obatOut                = new ObatOut();
                $obatOut->trx_id        = $trx_id;
                $obatOut->kodeObat      = $request->txt_obat[$i];
                $obatOut->OutStock      = $request->qty[$i];
                $obatOut->save();

                $getObat         = Obat::where('kodeObat',$request->txt_obat[$i])->first();
                $updateStockObat = Obat::where('kodeObat', '=', $request->txt_obat[$i])->update(
                    array('stockObat' => $getObat->stockObat-$request->qty[$i])
                );

                return redirect('/obat')->with('sukses', 'Proses Berhasil Melakukan Pengeluaran Obat');
            }

        } catch (Exception $e) {

            DB::rollback();
            return $e;
            
        }
    }
}
