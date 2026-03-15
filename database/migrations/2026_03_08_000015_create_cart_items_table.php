<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('cart_items')) {
            Schema::create('cart_items', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('product_id');
                $table->integer('quantity')->default(1);
                $table->decimal('unit_price', 10, 2)->default(0);
                $table->decimal('subtotal', 10, 2)->default(0);
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('customers')->onDelete('cascade');
                $table->foreign('product_id')->references('id')->on('products_inventory')->onDelete('cascade');
            });
        } else {
            Schema::table('cart_items', function (Blueprint $table) {
                if (!Schema::hasColumn('cart_items', 'product_id')) {
                    $table->unsignedBigInteger('product_id')->after('user_id');
                }
                if (!Schema::hasColumn('cart_items', 'unit_price')) {
                    $table->decimal('unit_price', 10, 2)->default(0)->after('quantity');
                }
                if (!Schema::hasColumn('cart_items', 'subtotal')) {
                    $table->decimal('subtotal', 10, 2)->default(0)->after('unit_price');
                }
                // foreign key additions require raw statements in some drivers, so check
                // adding them only if missing might need manual DB work.
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
