<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('detail_penjualan', function (Blueprint $table) {
            // Drop foreign key lama
            $table->dropForeign(['produk_id']);

            // Tambah foreign key baru dengan ON DELETE CASCADE
            $table->foreign('produk_id')
                  ->references('id')
                  ->on('produk')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('detail_penjualan', function (Blueprint $table) {
            $table->dropForeign(['produk_id']);

            // Foreign key lama (tanpa cascade)
            $table->foreign('produk_id')
                  ->references('id')
                  ->on('produk');
        });
    }
};

