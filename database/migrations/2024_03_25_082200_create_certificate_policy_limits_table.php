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
        Schema::create('certificate_policy_limits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certificate_id')->nullable()->constrained('certificates');
            $table->foreignId('policy_type_id')->nullable()->constrained('policy_types');
            $table->foreignId('policy_limit_id')->nullable()->constrained('policy_limits');
            $table->decimal('amount', 10, 2)->nullable()->default(0);
            $table->tinyInteger('is_checkbox')->nullable()->default(0);
            $table->tinyInteger('is_checked')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_policy_limits');
    }
};
