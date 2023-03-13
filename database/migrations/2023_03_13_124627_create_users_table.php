<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;



return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('telephoneNumber');
            $table->string('password');
            $table->softDeletes();
            $table->timestamps();
        });
        User::create(['firstName' => 'admin','lastName' => 'admin','email' => 'admin@themesbrand.com','telephoneNumber'=>'0700000000','password' => Hash::make('123456'),'created_at' => now(),]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
