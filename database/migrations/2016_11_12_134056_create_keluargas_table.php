<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluargas', function (Blueprint $table) {
            $table->increments('id_kk');
            $table->string('no_kk');
            $table->string('alamat');
            $table->integer('rw_id')->unsigned();
            $table->foreign('rw_id')->references('id_rw')->on('rws')->onDelete('cascade');
            $table->integer('rt_id')->unsigned();
            $table->foreign('rt_id')->references('id_rt')->on('rts')->onDelete('cascade');
            $table->double('vektor_s',15,8)->nullable();
            $table->double('vektor_v',15,8)->nullable();
            //$table->timestamps();
            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keluargas');
    }
}
