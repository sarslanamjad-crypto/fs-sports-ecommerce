<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('login_security_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('ip_address', 45)->nullable();
            $table->integer('attempt_count')->default(0);
            $table->boolean('is_successful')->default(false);
            $table->string('user_agent')->nullable();
            $table->timestamp('locked_until')->nullable();
            $table->timestamp('logged_at')->useCurrent();

            $table->foreign('user_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('login_security_logs');
    }
};
