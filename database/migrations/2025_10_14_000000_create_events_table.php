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
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('location');
            $table->string('adress')->nullable();
            $table->date('date');
            $table->time('time');
            $table->integer('max_spots');
            $table->integer('available_spots')->nullable();
            $table->integer('tickets_sold')->default(0);
            $table->decimal('revenue', 10, 2)->default(0.00);
            $table->integer('category_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
