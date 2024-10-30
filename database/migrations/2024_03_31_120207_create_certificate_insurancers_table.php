<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('certificate_insurancers', function (Blueprint $table) {
      $table->id();
      $table->foreignId('certificate_id')->constrained('certificates');
      $table->foreignId('insur_a_id')->constrained('insurance_providers');
      $table
        ->foreignId('insur_b_id')
        ->nullable()
        ->constrained('insurance_providers');
      $table
        ->foreignId('insur_c_id')
        ->nullable()
        ->constrained('insurance_providers');
      $table
        ->foreignId('insur_d_id')
        ->nullable()
        ->constrained('insurance_providers');
      $table
        ->foreignId('insur_e_id')
        ->nullable()
        ->constrained('insurance_providers');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('certificate_insurancers');
  }
};
