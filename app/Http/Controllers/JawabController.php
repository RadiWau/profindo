<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
Use Exception;
use Carbon\Carbon;

class JawabController extends Controller
{

    
    public function Soal1(){
        try{
            
           for($i=1; $i<100; $i++){
			   if($i%2){
				   echo $i.'<br/>';
			   }
		   }
        }
        catch (\Exception $e) {
            return $e;
        }
    }
	
	public function Soal2($nilai){
        try{
            
           $valueGrade = "";
		   
			if(!empty($nilai)){
				if ($nilai <= 100 && $nilai >= 80)
				{
					$valueGrade = 'A';
					return $valueGrade;
				}
				else if ($nilai <= 79 && $nilai >= 60)
				{
					$valueGrade = 'B';
					return $valueGrade;
				}
				else if ($nilai <= 59 && $nilai >= 40)
				{
					$valueGrade = 'C';
					return $valueGrade;
				}
				else if ($nilai <= 40)
				{
					$valueGrade = 'D';
					return $valueGrade;
				}
				else{
					return "Nilai Terlalu Besar Atau Terlalu Kecil";
				}
		   }
		   
        }
        catch (\Exception $e) {
            return $e;
        }
    }
	
	public function Soal3(){
        try{
            $mulai=5;
			for($aa=$mulai;$aa>0;$aa--){
				for($ii=1; $ii<=$aa; $ii++){
					echo " &nbsp";
				}
				for($cc=$mulai;$cc>=$aa;$cc--){
					echo"*";
				}
				echo"<br>";
			}
        }
        catch (\Exception $e) {
            return $e;
        }
    }
}
