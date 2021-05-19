<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id_pembayaran');
            $table->string('nama_pengirim');
            $table->date('tanggal_bayar');
            $table->string('foto_bukti')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('nominal');
            $table->string('metode')->nullable();
            $table->string('nota_no')->nullable();
            $table->foreign('nota_no')->references('no_nota')->on('penyewaan');
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
        Schema::dropIfExists('pembayaran');
    }
}
