<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipping_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->text('shipping_address');
            $table->string('city')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('order_notes')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders_transactions')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipping_details');
    }
};
