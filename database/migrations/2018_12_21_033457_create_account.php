<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('id_login');
            $table->primary(['id','id_login']);
            $table->string('nameUser',200);
            $table->text('detail');
            $table->integer('id_room')->unsigned();
            $table->foreign('id_room')->references('id_type1')->on('TypeRoom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account');
    }
}
