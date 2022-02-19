<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableObatTrx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat_trx', function (Blueprint $table) {
            $table->id();
            $table->string('trx_id', 15);
            $table->string('kodeApoteker', 10);
            $table->string('trx_tanggal', 15);
            $table->string('trx_nama', 100);
            $table->text('trx_keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obat_trx');
    }
}
