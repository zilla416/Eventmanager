<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Use raw SQL for complex primary key modifications
        // Step 1: Remove AUTO_INCREMENT from customer_id first
        DB::statement('ALTER TABLE `orders` MODIFY COLUMN `customer_id` INT UNSIGNED NOT NULL');
        
        // Step 2: Now we can drop the primary key
        DB::statement('ALTER TABLE `orders` DROP PRIMARY KEY');
        
        // Step 3: Make order_id the auto-increment primary key
        DB::statement('ALTER TABLE `orders` MODIFY COLUMN `order_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY');
        
        // Step 4: Add new columns using Schema builder for better compatibility
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'event_id')) {
                $table->unsignedInteger('event_id')->nullable()->after('customer_id');
            }
            
            if (!Schema::hasColumn('orders', 'quantity')) {
                $table->unsignedInteger('quantity')->default(1)->after('event_id');
            }
            
            if (!Schema::hasColumn('orders', 'total')) {
                $table->decimal('total', 10, 2)->default(0.00)->after('quantity');
            }
            
            if (!Schema::hasColumn('orders', 'status')) {
                $table->string('status')->default('completed')->after('total');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Remove added columns
            if (Schema::hasColumn('orders', 'event_id')) {
                $table->dropColumn('event_id');
            }
            if (Schema::hasColumn('orders', 'quantity')) {
                $table->dropColumn('quantity');
            }
            if (Schema::hasColumn('orders', 'total')) {
                $table->dropColumn('total');
            }
            if (Schema::hasColumn('orders', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
