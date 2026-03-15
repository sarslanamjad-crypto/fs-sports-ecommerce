<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('manufacturing_partners', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name');
            $table->date('contract_start_date')->nullable();
            $table->decimal('quality_score', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('manufacturing_partners');
    }
};
