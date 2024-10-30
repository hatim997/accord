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
        Schema::create('truck_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('vehicle_registration_number', 255)->nullable();
            $table->string('vehicle_make', 255)->nullable();
            $table->string('vehicle_model', 255)->nullable();
            $table->integer('vehicle_year')->nullable();
            $table->string('vehicle_capacity', 255)->nullable();
            $table->string('vehicle_status', 50)->nullable();
            $table->string('mc_number', 255)->nullable();
            $table->string('license_number', 255)->nullable();
            $table->string('license_expiry_date', 255)->nullable();
            $table->string('license_type', 255)->nullable();
            $table->string('years_of_experience', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('truck_details');
    }
};
