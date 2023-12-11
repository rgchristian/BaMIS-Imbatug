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
            $table->string('event_name')->nullable();
            $table->string('host_name')->nullable();
            $table->datetime('event_date_time')->nullable();
	        $table->datetime('attendance_record_date_time_created')->nullable();
            $table->text('event_details')->nullable();
            $table->string('event_location')->nullable();
            $table->text('list_attendees')->nullable();
            $table->timestamps();
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
