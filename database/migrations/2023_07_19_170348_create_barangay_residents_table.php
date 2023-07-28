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
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('h_educ_attainment')->nullable();
            $table->string('monthly_income')->nullable();
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->string('philhealth_no')->nullable();
            $table->string('votersID')->nullable();
            $table->string('household_no')->nullable();
            $table->string('purokID')->nullable();
            $table->string('h_ownership_status')->nullable();
            $table->string('length_stay')->nullable();
            $table->string('r_head_family')->nullable();
            $table->string('abled_person')->nullable();

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
