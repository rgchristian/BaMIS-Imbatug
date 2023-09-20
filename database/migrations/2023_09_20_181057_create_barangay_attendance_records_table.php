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
        Schema::create('barangay_attendance_records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('event_name')->nullable();
            $table->string('host_name')->nullable();
            $table->string('event_details')->nullable();
            $table->string('event_location')->nullable();
            $table->datetime('event_date_time')->nullable();
            $table->string('list_attendees')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangay_attendance_records');
    }
};
