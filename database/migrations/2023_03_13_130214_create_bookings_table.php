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
            $table->increments('id');
            $table->integer('clientID')->unsigned();
            $table->foreign('clientID')->references('id')->on('users');
            $table->date('date');
            $table->time('time');
            $table->double('cost');
            $table->enum('status', ['In progress', 'Complete','Reserved'])->default('In progress');
            $table->softDeletes();
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
