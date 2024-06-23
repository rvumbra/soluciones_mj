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
        Schema::create('fests', function (Blueprint $table) {
            $table->id()->primary();
            $table->timestamps();
            $table->string('name')->unique();
            $table->string('color');
            $table->string('date');
            $table->integer('recurrent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fests');
    }
};
