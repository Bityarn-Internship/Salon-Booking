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
        Schema::create('booked_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bookingID')->unsigned();
            $table->foreign('bookingID')->references('id')->on('bookings');
            $table->integer('serviceID')->unsigned();
            $table->foreign('serviceID')->references('id')->on('services');
            $table->integer('employeeID')->unsigned();
            $table->foreign('employeeID')->references('id')->on('employees');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booked_services');
    }
};
