<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyewaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->bigIncrements('id_penyewaan');
            $table->string('no_nota')->index();
            $table->integer('status_pembayaran')->default(0);
            $table->integer('status_pengembalian')->default(0);
            $table->integer('status_jaminan')->default(0);
            $table->integer('total_biaya');
            $table->date('tanggal');
            $table->time('jam');
            $table->unsignedBigInteger('pengguna_id')->nullable();
            $table->foreign('pengguna_id')->references('id_pengguna')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('penyewaan');
    }
}
