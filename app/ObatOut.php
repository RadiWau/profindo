<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObatOut extends Model
{
    protected $table = 'obat_outs';
	protected $primaryKey = 'id';
    protected $fillable = ['trx_id', 'kodeObat', 'kodeApoteker', 'outStock','created_at'];
}
