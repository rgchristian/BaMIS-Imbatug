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
        Schema::create('barangay_announcements', function (Blueprint $table) {
            $table->id();
            $table->string('announcement_name')->nullable();
            $table->string('announcement_photo')->nullable();
            $table->string('announcement_host_name')->nullable();
            $table->text('announcement_details')->nullable();
            $table->datetime('announcement_date_time_created')->nullable();
	        $table->datetime('announcement_date_time')->nullable();
            $table->string('announcement_location')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangay_announcements');
    }
};
