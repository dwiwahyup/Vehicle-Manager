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
            $table->bigInteger('driver_id');
            $table->bigInteger('vehicle_id');
            $table->bigInteger('manager_id');
            $table->bigInteger('staff_id');
            $table->string('approval_status_manager')->default('0');
            $table->string('approval_status_staff')->default('0');
            $table->date('pickup_date');
            $table->date('return_date');
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
