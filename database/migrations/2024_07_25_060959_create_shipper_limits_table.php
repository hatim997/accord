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
        Schema::create('shipper_limits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipper_id')->nullable()->constrained('users');
            $table->foreignId('policy_id')->nullable()->constrained('policies');
            $table->double('policy_amount',8,2)->nullable()->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipper_limits');
    }
};
