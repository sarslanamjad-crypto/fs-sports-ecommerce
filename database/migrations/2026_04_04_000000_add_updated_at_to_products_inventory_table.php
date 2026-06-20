<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products_inventory', function (Blueprint $table) {
            // Add updated_at column after created_at if it doesn't exist
            if (!Schema::hasColumn('products_inventory', 'updated_at')) {
                $table->timestamp('updated_at')->useCurrent();
            }
        });
    }

    public function down(): void
    {
        Schema::table('products_inventory', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });
    }
};
