<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('payment_method')->nullable();
            $table->string('status')->nullable();
            $table->string('transaction_reference')->nullable();
            $table->timestamp('transaction_date')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders_transactions')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_transactions');
    }
};
