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
        Schema::create('barangay_certificates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('address')->nullable();
            $table->string('purpose')->nullable();
            $table->string('amount')->nullable();
            $table->string('certificate_file')->nullable();
            $table->string('date_issued')->nullable();
            $table->string('attendance_record')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangay_certificates');
    }
};
