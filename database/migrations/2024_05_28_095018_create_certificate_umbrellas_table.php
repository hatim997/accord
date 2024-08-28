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
        Schema::create('certificate_umbrellas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certificate_id')->nullable()->constrained('certificates');
            $table->foreignId('policy_type_id')->nullable()->constrained('policy_types');
            $table->foreignId('umbrella_subtype_id')->nullable()->constrained('policies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_umbrellas');
    }
};
