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
        //room
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('images', 255);
            $table->text('title');
            $table->string('capacity', 100);
            $table->text('services');
            $table->text('content');
            $table->string('Price', 100);
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
        Schema::dropIfExists('booking');
    }
};
