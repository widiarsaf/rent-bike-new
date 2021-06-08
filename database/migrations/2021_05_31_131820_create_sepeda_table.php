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
            $table->string('unit_code', 20)->index()->unique();
            $table->unsignedBigInteger('katalog_id')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('foto_unit')->default('images/sepedaDefault.jpg
            ');
            $table->foreign('kategori_id')->references('id_kategori')->on('kategori')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('katalog_id')->references('id_katalog')->on('katalog')->onDelete('set null')->onUpdate('cascade');
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
