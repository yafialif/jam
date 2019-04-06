<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateRecordingTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('recording',function(Blueprint $table){
            $table->increments("id");
            $table->unsignedInteger("ustad_id")->nullable();
            $table->string("id_recording")->nullable();
            $table->string("record")->nullable();
            $table->string("note")->nullable();
            $table->tinyInteger("status")->default(0)->nullable();
            $table->timestamps();

            $table->foreign('ustad_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recording');
    }

}