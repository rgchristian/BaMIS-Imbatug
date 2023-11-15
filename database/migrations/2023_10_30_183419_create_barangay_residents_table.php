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
        Schema::create('barangay_residents', function (Blueprint $table) {
            $table->id();
            $table->string('qr_code')->nullable();
            $table->string('photoStore')->nullable();
	        $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->string('municipality')->nullable();
            $table->string('barangay')->nullable();
            $table->string('purok')->nullable();
            $table->string('household_no')->nullable();
            $table->datetime('date_filed_resident_profile')->nullable();
            $table->string('signature')->nullable();
            $table->string('name')->unique()->nullable();
            $table->string('photo')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('sex')->nullable();
            $table->datetime('birthdate')->nullable();
            $table->string('age')->nullable();
            $table->string('status')->nullable();
            $table->string('pwd')->nullable();
            $table->string('tribe')->nullable();
            $table->string('religion')->nullable();
            $table->string('address')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('educational_attainment')->nullable();
            $table->string('occupation')->nullable();
            $table->string('relation_to_the_hh_head')->nullable();
            $table->string('moral')->nullable();
            $table->string('active_participation')->nullable();
            $table->string('registered_voter')->nullable();
            $table->string('household_representative')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangay_residents');
    }
};
