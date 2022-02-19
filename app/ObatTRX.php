<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObatTRX extends Model
{
    protected $table = 'obat_trx';
	protected $primaryKey = 'id';
    protected $fillable = ['trx_id', 'kodeObat', 'kodeApoteker', 'outStock','created_at'];
}
