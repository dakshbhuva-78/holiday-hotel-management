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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('u_name')->nullable(false);
            $table->string('u_email')->nullable(false)->unique();
            $table->string('u_phone')->nullable(false);
            $table->string('u_password')->nullable(false);
            $table->string('u_image')->nullable(false);
            $table->string('u_status')->default('Inactive')->nullable(false);
            $table->string('u_token')->unique()->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
