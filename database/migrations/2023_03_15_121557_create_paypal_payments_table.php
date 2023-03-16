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
        Schema::create('paypal_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_id');
            $table->string('payer_id');
            $table->string('payer_email');

            $table->integer('bookingID')->unsigned();
            $table->foreign('bookingID')->references('id')->on('bookings');

            $table->float('amount', 10, 2);
            $table->string('currency');
            $table->string('payment_status');
            $table->softDeletes()->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paypal_payments');
    }
};
