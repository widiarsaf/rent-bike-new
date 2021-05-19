<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sepeda_id')->nullable();
            $table->foreign('sepeda_id')->references('id_sepeda')->on('sepeda');
            $table->unsignedBigInteger('paket_id')->nullable();
            $table->foreign('paket_id')->references('id_paket')->on('paket');
            $table->unsignedBigInteger('pengguna_id')->nullable();
            $table->foreign('pengguna_id')->references('id_pengguna')->on('users');
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
        Schema::dropIfExists('cart');
    }
}
