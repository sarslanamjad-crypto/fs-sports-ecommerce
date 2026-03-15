<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('online_payment_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('gateway_name')->nullable();
            $table->string('response_code')->nullable();
            $table->string('payment_status')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders_transactions')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('online_payment_logs');
    }
};
