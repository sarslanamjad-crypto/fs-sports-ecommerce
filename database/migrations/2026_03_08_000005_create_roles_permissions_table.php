<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->boolean('can_manage_admins')->default(false);
            $table->boolean('can_manage_staff')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles_permissions');
    }
};
