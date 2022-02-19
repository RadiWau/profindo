<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obats';
	protected $primaryKey = 'id';
    protected $fillable = ['kodeObat', 'nm_obat', 'hargaObat', 'stockObat','tglKedeluarsa'];
}
