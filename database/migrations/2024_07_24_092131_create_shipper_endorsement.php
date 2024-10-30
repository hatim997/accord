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
        Schema::create('shipper_endorsements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipper_id')->nullable()->constrained('users');
            $table->foreignId('endors_id')->nullable()->constrained('endorsements');
            $table->string('others', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipper_endorsements');
    }
};
