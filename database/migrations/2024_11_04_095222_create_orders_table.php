<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_id'); // Using subscription_id for clarity
            $table->string('invoice', 11)->unique(); // Store invoice as string with a unique constraint
            $table->timestamp('issue_date')->nullable();
            $table->decimal('price', 8, 2);
            $table->timestamps();

            // Define the foreign key relationship
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('orders');
    }
};
