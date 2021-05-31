<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenyewaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('detailPenyewaan', function (Blueprint $table) {
            $table->bigIncrements('id_detailPenyewaan');
            $table->string('nota_no')->nullable();
            $table->foreign('nota_no')->references('no_nota')->constrained()->on('penyewaan')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('sepeda_id')->nullable();
            $table->foreign('sepeda_id')->references('id_sepeda')->on('sepeda')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('paket_id')->nullable();
            $table->foreign('paket_id')->references('id_paket')->on('paket')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal');
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
        Schema::dropIfExists('detail_penyewaan');
    }
}