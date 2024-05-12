<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id_order')->primary()->autoIncrement();
            $table->string('nama_pemesan', 50);
            $table->date('tgl_order')->nullable();
            $table->bigInteger('id_menu')->unsigned();
            $table->foreign('id_menu')->references('id_menu')->on('menu');
            $table->integer('kuantitas');
            $table->decimal('total_harga', 10);
            $table->bigInteger('no_meja')->unsigned();
            $table->char('metode_pembayaran', 10)->nullable();
            $table->foreign('no_meja')->references('no_meja')->on('meja');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
