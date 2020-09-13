<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('serahan');
            $table->integer('jumlah_serahan');
            $table->date('terima');
            $table->integer('jumlah_terima');
            $table->unsignedBigInteger('taman');
            $table->unsignedBigInteger('jalan');
            $table->string('sub_sisa');
            $table->string('frekuensi');
            $table->string('hari');
            $table->string('lokasi');
            $table->string('jenis_lokasi');
            $table->string('unit');
            $table->string('saiz_bin');
            $table->integer('bil_tong');
            $table->string('catatan')->nullable();

            // $table->foreign('taman')->references('id')->on('tamen');
            // $table->foreign('jalan')->references('id')->on('jalans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sisas');
    }
}
