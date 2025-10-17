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
        // For fresh PostgreSQL deployment, recreate the orders table with correct structure
        if (Schema::hasTable('orders')) {
            Schema::dropIfExists('orders');
        }
        
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id'); // Auto-incrementing bigint primary key
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('event_id');
            $table->integer('quantity');
            $table->decimal('total', 8, 2);
            $table->string('status', 50);
            $table->timestamps();
            
            // Foreign keys
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('event_id')->references('event_id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
