<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsGaleri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galeri', function (Blueprint $table) {
            $table->string('foto')->after('id')->default('images/userDefault.png');
            $table->string('nama')->after('foto')->nullable();
            $table->string('deskripsi')->after('nama')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galeri', function (Blueprint $table) {
            $table->dropColumn('foto');
            $table->dropColumn('nama');
            $table->dropColumn('deskripsi');
        });
    }
}
