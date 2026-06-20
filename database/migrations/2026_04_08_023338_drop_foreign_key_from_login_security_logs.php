<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('login_security_logs', function (Blueprint $table) {
            // Drop the incorrect FK that references 'admins' — this log table
            // is used for frontend users (registration table), not admin users.
            $table->dropForeign(['user_id']);
        });
    }

    public function down(): void
    {
        Schema::table('login_security_logs', function (Blueprint $table) {
            $table->foreign('user_id')
                  ->references('id')
                  ->on('admins')
                  ->onDelete('cascade');
        });
    }
};
