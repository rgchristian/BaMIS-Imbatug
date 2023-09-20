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
        Schema::create('barangay_revenues', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('revenue_certificate')->nullable();
            $table->string('revenue_clearance')->nullable();
            $table->string('revenue_blotter')->nullable();
            $table->string('revenue_other')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangay_revenues');
    }
};
