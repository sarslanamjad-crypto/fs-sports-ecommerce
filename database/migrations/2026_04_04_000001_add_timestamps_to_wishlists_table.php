<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('wishlists', function (Blueprint $table) {
            // Add created_at and updated_at if they don't exist
            if (!Schema::hasColumn('wishlists', 'created_at')) {
                $table->timestamp('created_at')->useCurrent();
            }
            if (!Schema::hasColumn('wishlists', 'updated_at')) {
                $table->timestamp('updated_at')->useCurrent();
            }
        });
    }

    public function down(): void
    {
        Schema::table('wishlists', function (Blueprint $table) {
            if (Schema::hasColumn('wishlists', 'created_at')) {
                $table->dropColumn('created_at');
            }
            if (Schema::hasColumn('wishlists', 'updated_at')) {
                $table->dropColumn('updated_at');
            }
        });
    }
};
