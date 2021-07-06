<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->text('judul_buku');
            $table->string('uuid')->length(50);
            $table->string('teu')->length(150);
            $table->integer('status_baca')->length(3);
            $table->string('no_panggilan')->length(150)->nullable();
            $table->string('cetakan')->length(150)->nullable();
            $table->text('tempat_penerbit')->nullable();
            $table->string('penerbit')->length(150);
            $table->integer('tahun_terbit')->length(5);
            $table->string('deskripsi_fisik')->length(100)->nullable();
            $table->text('subjek')->length(150)->nullable();
            $table->text('isbn_issn')->length(150)->nullable();
            $table->string('bahasa')->length(150);
            $table->text('bidang_hukum')->length(150)->nullable();
            $table->string('no_induk')->length(150)->nullable();
            $table->string('lokasi')->length(150);
            $table->string('lampiran')->length(150)->nullable();
            $table->integer('jumlah')->length(11);
            $table->string('cover')->default('default.png');
            $table->foreignId('tipe_dokumen_id')->constrained('tipe_dokumens')->onDelete('CASCADE');
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
        Schema::dropIfExists('bukus');
    }
}
