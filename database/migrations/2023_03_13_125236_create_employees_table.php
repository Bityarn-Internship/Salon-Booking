<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Employee;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('telephoneNumber');
            $table->string('IDNumber');
            $table->integer('positionID')->unsigned();
            $table->foreign('positionID')->references('id')->on('positions');
            $table->string('password');
            $table->softDeletes();
            $table->timestamps();
        });
            Employee::create(['firstName' => 'admin','lastName' => 'admin','email' => 'admin@themesbrand.com','telephoneNumber'=>'0700000000','IDNumber'=>'39500000','positionID'=>'1','password' => Hash::make('123456'),'created_at' => now(),]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
