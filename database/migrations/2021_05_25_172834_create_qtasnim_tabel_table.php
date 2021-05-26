<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQtasnimTabelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qtasnim_tabel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_barang',255);
            $table->integer('stok');
            $table->integer('jumlah_terjual');
            $table->string('jenis_barang',255);
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
        Schema::dropIfExists('qtasnim_tabel');
    }
}
