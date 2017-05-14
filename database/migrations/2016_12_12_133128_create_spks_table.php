<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kk_id')->unsigned();
            $table->foreign('kk_id')->references('id_kk')->on('keluargas');
            $table->integer('variabel_id')->unsigned();
            $table->foreign('variabel_id')->references('id')->on('variabels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spks');
    }
}
