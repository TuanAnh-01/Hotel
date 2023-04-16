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
        Schema::create('bookevent', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
            $table->string('phone', 100);
            $table->string('capacity', 100);
            $table->string('Price', 100);
            $table->date('start');
            $table->date('end');
            $table->string('paymentstatus', 100);
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('event')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookevent');
    }
};
