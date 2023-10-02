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
        Schema::create('school_fee_payment_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_fee_payment_id')->references('id')->on('school_fee_payments')->cascadeOnDelete();
            $table->double('amount_paid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_fee_payment_histories');
    }
};
