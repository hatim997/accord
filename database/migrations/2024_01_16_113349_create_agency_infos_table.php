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
    Schema::create('agency_infos', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained('users');
      $table->string('name')->nullable();
      $table->string('address')->nullable();
      $table->string('address2')->nullable();
      $table->string('city')->nullable();
      $table->string('state')->nullable();
      $table->string('zip')->nullable();
      $table->string('cellphone')->nullable();
      $table->string('extra_email')->nullable();
      $table->string('fax', 255)->nullable();
      $table->string('lname', 255)->nullable();
      $table->string('mname', 255)->nullable();
      $table->string('fname', 255)->nullable();
      $table->string('ialn', 255)->nullable();
      $table->string('prefix', 255)->nullable();
      $table->string('suffix', 255)->nullable();
      $table->string('image_path', 255)->nullable();
      $table->string('producer_customer_number', 255)->nullable();
      $table->tinyInteger('is_active')->default(1);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('_infos');
  }
};
