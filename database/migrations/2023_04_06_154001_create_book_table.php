<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
            $table->string('phone', 100);
            $table->string('capacity', 100);
            $table->string('Price', 100);
            $table->date('arrival');
            $table->date('departure');
            $table->string('paymentstatus', 100);
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('booking')->onUpdate('cascade');
            $table->string('status', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');
    }
};
