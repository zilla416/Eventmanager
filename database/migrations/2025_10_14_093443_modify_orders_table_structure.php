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
            $table->increments('order_id'); // Auto-incrementing primary key
            $table->date('order_date');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('event_id')->nullable();
            $table->unsignedInteger('quantity')->default(1);
            $table->decimal('total', 10, 2)->default(0.00);
            $table->string('status')->default('completed');
            
            // Foreign keys
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
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
