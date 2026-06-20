<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Drop the old foreign key and recreate it to reference 'registration' table
        Schema::table('wishlists', function (Blueprint $table) {
            // Drop the old foreign key if it exists
            try {
                $table->dropForeign('wishlists_user_id_foreign');
            } catch (\Exception $e) {
                // Foreign key might not exist, continue
            }
        });

        // Add the corrected foreign key
        Schema::table('wishlists', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('registration')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('wishlists', function (Blueprint $table) {
            try {
                $table->dropForeign('wishlists_user_id_foreign');
            } catch (\Exception $e) {
                // Continue if foreign key doesn't exist
            }
        });
    }
};
