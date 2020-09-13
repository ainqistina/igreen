<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('serahan');
            $table->string('jumlah_serahan');
            $table->date('terima');
            $table->string('jumlah_terima');
            $table->string('taman');
            $table->string('jalan');
            $table->string('sub_awam');
            $table->string('jenis_sub');
            $table->string('unit');
            $table->string('jenis');
            $table->string('frekuensi');
            $table->string('catatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('awams');
    }
}
