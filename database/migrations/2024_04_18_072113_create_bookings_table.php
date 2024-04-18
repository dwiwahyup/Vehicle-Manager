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
            $table->bigInteger('user_id');
            $table->bigInteger('driver_id');
            $table->bigInteger('vehicle_id');
            $table->string('approval_status_manager')->default('0');
            $table->string('approval_status_staff')->default('0');
            $table->dateTime('pickup_date');
            $table->dateTime('return_date');
            $table->string('fuel_consumption');
            $table->text('note')->nullable();
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
