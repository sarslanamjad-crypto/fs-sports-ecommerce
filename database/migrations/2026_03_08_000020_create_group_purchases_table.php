<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('group_purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('group_lead_id');
            $table->integer('current_members')->default(0);
            $table->decimal('discount_rate', 5, 2)->default(0);
            $table->string('status')->nullable();
            $table->timestamps();

            // group_lead_id could reference customers
            $table->foreign('product_id')->references('id')->on('products_inventory')->onDelete('cascade');
            $table->foreign('group_lead_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('group_purchases');
    }
};
