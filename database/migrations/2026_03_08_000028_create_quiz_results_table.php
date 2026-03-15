<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('score')->default(0);
            $table->boolean('is_winner')->default(false);
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('quiz_id')->references('id')->on('quiz_competitions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quiz_results');
    }
};
