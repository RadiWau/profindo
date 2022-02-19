<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apotekers extends Model
{
    public $table = "apoteker";
    protected $primaryKey = 'id';
    protected $fillable = ['kodeApoteker', 'nm_apoteker', 'email', 'tgl_lahir','password'];

}
