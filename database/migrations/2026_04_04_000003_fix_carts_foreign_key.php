<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Fix carts table foreign key
        Schema::table('carts', function (Blueprint $table) {
            try {
                $table->dropForeign('carts_user_id_foreign');
            } catch (\Exception $e) {
                // Foreign key might not exist
            }
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('registration')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            try {
                $table->dropForeign('carts_user_id_foreign');
            } catch (\Exception $e) {
                // Continue if foreign key doesn't exist
            }
        });
    }
};
