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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('item_id');
            $table->date('booking_date');
            $table->date('return_date');
            $table->date('confirm_return_date')->nullable();
            $table->enum('status', ['waiting', 'approved', 'on_going','rejected', 'canceled', 'done', 'done_late']);
            $table->string('slug')->unique()->nullable();
            $table->unsignedBigInteger('stock');
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('item_id')->references('id')->on('items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
