<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateSlider2Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('slider2',function(Blueprint $table){
            $table->increments("id");
            $table->string("title")->nullable();
            $table->string("category")->nullable();
            $table->string("file")->nullable();
            $table->string("arab")->nullable();
            $table->string("terjemah")->nullable();
            $table->string("riwayat")->nullable();
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
        Schema::drop('slider2');
    }

}