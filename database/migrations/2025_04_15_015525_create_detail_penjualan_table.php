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

        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penjualan_id')->constrained('penjualan');
            $table->foreignId('produk_id')->constrained('produk');
            $table->integer('jumlah');
            $table->integer('harga_satuan');
            $table->integer('sub_total');
            $table->timestamps();

        });

    }


    /**

     * Reverse the migrations.

     */

    public function down(): void

    {
        Schema::dropIfExists('detail_penjualan');
    }

};




