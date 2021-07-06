<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->length(50);
            $table->string('nama')->length(150)->nullable();
            $table->string('no_hp')->length(150)->nullable();
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian')->nullable();
            $table->integer('jumlah')->length(9);
            $table->foreignId('buku_id')->constrained('bukus')->onDelete('CASCADE');
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
        Schema::dropIfExists('peminjaman');
    }
}
