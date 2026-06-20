<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products_inventory', function (Blueprint $table) {
            $table->integer('discount_percentage')->nullable()->default(null);
            $table->double('discounted_price')->nullable()->default(null);
        });
    }

    public function down(): void
    {
        Schema::table('products_inventory', function (Blueprint $table) {
            $table->dropColumn(['discount_percentage', 'discounted_price']);
        });
    }
};
