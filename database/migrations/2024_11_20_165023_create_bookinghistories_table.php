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
        Schema::create('bookinghistories', function (Blueprint $table) {
            $table->id();
            $table->string('b_image')->nullable(false);
            $table->string('b_status')->nullable(false)->default('Pending');
            $table->string('room_id')->nullable(false);
            $table->string('b_id')->unique()->nullable(false);
            $table->string('u_name')->nullable(false);
            $table->string('u_email')->nullable(false);
            $table->string('u_phone')->nullable(false);
            $table->date('checkin_date')->nullable(false);
            $table->date('checkout_date')->nullable(false);
            $table->string('adults')->nullable(false);
            $table->string('children')->nullable(false);
            $table->string('total_price')->nullable(false);
            $table->string('p_status')->nullable(false)->default('Confirm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookinghistories');
    }
};
