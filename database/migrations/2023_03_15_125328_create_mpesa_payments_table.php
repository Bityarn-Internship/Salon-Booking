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
        Schema::create('mpesa_payments', function (Blueprint $table) {
            $table->id();
            $table->string('transactionID');
            $table->string('transactionDate');
            $table->decimal('amount', 8,2);
            $table->string('currency')->default('Kshs');
            $table->string('telephoneNumber');
            $table->integer('bookingID')->nullable()->unsigned();
            $table->foreign('bookingID')->references('id')->on('bookings');
            $table->enum('status', ['Pending Payment', 'Payment Complete','Deposit Paid'])->default('Pending Payment');
            $table->softDeletes();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mpesa_payments');
    }
};
