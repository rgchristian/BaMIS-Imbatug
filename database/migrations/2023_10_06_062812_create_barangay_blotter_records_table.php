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
        Schema::create('barangay_blotter_records', function (Blueprint $table) {
            $table->id();
            $table->string('incident_type')->nullable();
            $table->enum('incident_status', ['New', 'Pending', 'Ongoing', 'Finished'])->default('New')->nullable();
            $table->string('location')->nullable(); 
            $table->text('remarks')->nullable(); 
            $table->datetime('incident_date')->nullable();
            $table->datetime('incident_date_recorded')->nullable();
            $table->datetime('settlement_schedule')->nullable(); 
            $table->string('resident_name')->nullable();
            $table->string('resident_address')->nullable();
            $table->string('resident_phone')->nullable();
            $table->string('resident_age')->nullable();
            $table->string('complainant_name')->nullable();
            $table->string('complainant_address')->nullable();
            $table->string('complainant_phone')->nullable();
            $table->string('complainant_age')->nullable();
            $table->text('list_mediators')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangay_blotter_records');
    }
};
