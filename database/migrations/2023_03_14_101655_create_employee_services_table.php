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
        Schema::create('employee_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employeeID')->unsigned();
            $table->foreign('employeeID')->references('id')->on('employees');
            $table->integer('serviceID')->unsigned();
            $table->foreign('serviceID')->references('id')->on('services');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_services');
    }
};
