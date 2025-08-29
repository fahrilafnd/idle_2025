<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('id_ormawa')->references('id')->on('ormawas');
        });

        Schema::table('posts', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('kategoris', function(Blueprint $table) {
            $table->foreign('id_ormawa')->references('id')->on('ormawas');
        });

        Schema::table('tims', function(Blueprint $table) {
            $table->foreign('id_kategori')->references('id')->on('kategoris');
            $table->foreign('ketua_tim')->references('nim')->on('mahasiswas');
        });

        Schema::table('submissions', function(Blueprint $table) {
            $table->foreign('id_tim')->references('id')->on('tims');
        });

        Schema::table('pesertas', function(Blueprint $table) {
            $table->foreign('nim')->references('nim')->on('mahasiswas');
            $table->foreign('id_tim')->references('id')->on('tims');
        });

        Schema::table('finalists', function(Blueprint $table) {
            $table->foreign('id_tim')->references('id')->on('pesertas');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
