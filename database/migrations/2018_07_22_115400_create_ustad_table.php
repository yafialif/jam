<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateUstadTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('ustad',function(Blueprint $table){
            $table->increments("id");
            $table->string("id_ustad");
            $table->string("nama_ustad");
            $table->unsignedInteger("category_id")->nullable();
            $table->string("password_ustad");
            $table->text("deskripsi")->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ustad');
    }

}