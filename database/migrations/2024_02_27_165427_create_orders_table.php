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
            $table->id();
            $table->string('orderNumber')->unique();
            $table->string('ordBatchId')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('telephone');
            $table->string('countryCode');
            $table->string('provinceCode');
            $table->string('city');
            $table->string('zip');
            $table->string('addr1');
            $table->string('addr2')->nullable();
            $table->string('phoneExtension')->nullable();
            $table->enum('payment_status', ['paid', 'unpaid'])->default('unpaid')->nullable();
            $table->timestamps();
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
