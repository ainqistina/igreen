<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekod', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jalan');
            $table->string('taman');
            $table->date('terima_ccc');
            $table->date('tamat_ccc');
            $table->date('notis');
            $table->string('status_sisa');
            $table->string('status_rumput');
            $table->string('status_longkang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekod');
    }
}
