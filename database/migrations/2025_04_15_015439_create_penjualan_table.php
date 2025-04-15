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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->bigInteger("user_id");
            $table->bigInteger("member_id");
            $table->date('tanggal_penjualan');
            $table->integer('total_harga');
            $table->integer('uang_diberikan');
            $table->integer('kembalian');
            $table->integer('poin_digunakan')->default(0);
            $table->timestamps();

        });

    }


    /**

     * Reverse the migrations.

     */

    public function down(): void

    {

        Schema::dropIfExists('penjualan');

    }

};

