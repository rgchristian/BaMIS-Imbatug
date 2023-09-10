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
            $table->timestamps();
            $table->string('incident_type')->nullable();
            $table->enum('incident_status', ['New', 'Pending', 'Ongoing', 'Finished'])->default('New')->nullable();
            $table->datetime('incident_date')->nullable();
            $table->datetime('incident_date_recorded')->nullable();
            $table->string('resident_name')->nullable();
            $table->string('resident_address')->nullable();
            $table->string('resident_phone')->nullable();
            $table->string('resident_age')->nullable();
            $table->string('complainant_name')->nullable();
            $table->string('complainant_address')->nullable();
            $table->string('complainant_phone')->nullable();
            $table->string('complainant_age')->nullable();
            $table->string('list_mediators')->nullable();
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
