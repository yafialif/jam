<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateJamsettingTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('jamsetting',function(Blueprint $table){
            $table->increments("id");
            $table->string("namemosque");
            $table->string("alamat");
            $table->string("logitude");
            $table->string("latitude");
            $table->string("waktuadzan");
            $table->string("countdown");
            $table->string("dzikir_time");
            $table->string("slider1");
            $table->string("slider2");
            $table->string("slider3");
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
        Schema::drop('jamsetting');
    }

}