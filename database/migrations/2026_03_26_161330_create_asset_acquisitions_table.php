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
        Schema::create('asset_acquisitions', function (Blueprint $table) {
            $table->id();

    $table->foreignId('asset_id')->constrained()->cascadeOnDelete();

    $table->date('tanggal_pembelian')->nullable();
    $table->string('sumber')->nullable(); // pembelian, hibah, sewa
    $table->decimal('harga', 15, 2)->nullable();
    $table->integer('jumlah')->default(1);
    $table->string('satuan')->default('unit');







            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_acquisitions');
    }
};
