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
        Schema::create('policy_limits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('policy_type_id')->constrained('policy_types');
            $table->string('coverage_item', 100);
            $table->string('nature_of_input', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policy_limits');
    }
};
