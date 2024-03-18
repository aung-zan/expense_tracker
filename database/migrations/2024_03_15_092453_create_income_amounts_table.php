<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('income_amounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('income_id')->constrained(table: 'incomes');
            $table->integer('amount');
            $table->string('income_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_amounts');
    }
};
