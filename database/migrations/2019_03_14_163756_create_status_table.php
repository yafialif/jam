<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateStatusTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('status',function(Blueprint $table){
            $table->increments("id");
            $table->integer("rfid_id")->references("id")->on("rfid");
            $table->enum("saur", [""]);
            $table->enum("buka", [""]);
            $table->enum("itikaf", [""]);
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
        Schema::drop('status');
    }

}