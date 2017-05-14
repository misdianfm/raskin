<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->increments('id_penduduk');
            $table->string('nik');
            //no kk 
            $table->integer('kk_id')->unsigned();
            $table->foreign('kk_id')->references('id_kk')->on('keluargas')->onDelete('cascade');
            
            $table->string('nama');
            //jenis kelamin
            $table->integer('jk_id')->unsigned();
            $table->foreign('jk_id')->references('id_jk')->on('jks');
            //tempat lahir
            $table->integer('tl_id')->unsigned();
            $table->foreign('tl_id')->references('id_tl')->on('tempatlahirs');
            
            $table->integer('goldar_id')->unsigned();
            $table->foreign('goldar_id')->references('id_goldar')->on('goldars');
            
            $table->integer('agama_id')->unsigned();
            $table->foreign('agama_id')->references('id_agama')->on('agamas');
            
            $table->integer('pendidikan_id')->unsigned();
            $table->foreign('pendidikan_id')->references('id_pendidikan')->on('pendidikans');
            
            $table->integer('pekerjaan_id')->unsigned();
            $table->foreign('pekerjaan_id')->references('id_pekerjaan')->on('pekerjaans');
            
            $table->string('status_kawin');
            
            $table->integer('shdk_id')->unsigned();
            $table->foreign('shdk_id')->references('id_shdk')->on('shdks');
            
            $table->string('nama_ayah');
            $table->string('nama_ibu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penduduks');
    }
}
