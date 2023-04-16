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
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('images', 255);
            $table->text('title');
            $table->string('venue', 100);
            $table->string('Capacity', 100);
            $table->text('services');
            $table->string('Price', 100);
            $table->text('content');
            $table->date('organization');
            $table->integer('views_count')->default(0);
            $table->string('Status', 100);
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
        Schema::dropIfExists('event');
    }
};
