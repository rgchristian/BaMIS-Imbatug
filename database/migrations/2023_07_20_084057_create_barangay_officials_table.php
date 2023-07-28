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
        Schema::create('barangay_officials', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active')->nullable();
            $table->datetime('term_start')->nullable();
            $table->datetime('term_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangay_officials');
    }
};
