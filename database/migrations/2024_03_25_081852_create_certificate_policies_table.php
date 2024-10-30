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
        Schema::create('certificate_policies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certificate_id')->nullable()->constrained('certificates');
            $table->foreignId('policy_type_id')->nullable()->constrained('policy_types');
            $table->foreignId('policy_id')->nullable()->constrained('policies');
            $table->double('policy_amount',8,2)->nullable()->default(0.0);
            $table->integer('policy_deductible')->nullable()->default(0);
            $table->integer('policy_retention')->nullable()->default(0);
            $table->tinyInteger('is_policy_checked')->nullable()->default(0);
            $table->tinyInteger('is_risk_retention_insured')->nullable()->default(0);
            $table->tinyInteger('is_actual_cash_value')->nullable()->default(0);
            $table->foreignId('insurance_provider_id')->nullable()->constrained('insurance_providers');
            $table->string('insurance_provider_code', 255)->nullable();
            $table->string('policy_number', 255)->nullable();
            $table->date('issue_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_policies');
    }
};
