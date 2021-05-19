<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSepedaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sepeda', function (Blueprint $table) {
            $table->bigIncrements('id_sepeda');
            $table->string('unit_code', 20)->index();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->string('deskripsi');
            $table->string('foto_unit');
            $table->string('status',20);
            $table->foreign('kategori_id')->references('id_kategori')->on('kategori');
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
        Schema::dropIfExists('sepeda');
    }
}
