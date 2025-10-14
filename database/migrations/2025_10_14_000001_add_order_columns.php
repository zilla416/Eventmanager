<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class AddOrderColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                if (!Schema::hasColumn('orders', 'event_id')) {
                    $table->unsignedInteger('event_id')->nullable()->after('customer_id');
                }
                if (!Schema::hasColumn('orders', 'quantity')) {
                    $table->unsignedInteger('quantity')->default(1)->after('event_id');
                }
                if (!Schema::hasColumn('orders', 'total')) {
                    $table->decimal('total', 10, 2)->default(0)->after('quantity');
                }
                if (!Schema::hasColumn('orders', 'status')) {
                    $table->string('status')->default('completed')->after('total');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                if (Schema::hasColumn('orders', 'status')) {
                    $table->dropColumn('status');
                }
                if (Schema::hasColumn('orders', 'total')) {
                    $table->dropColumn('total');
                }
                if (Schema::hasColumn('orders', 'quantity')) {
                    $table->dropColumn('quantity');
                }
                if (Schema::hasColumn('orders', 'event_id')) {
                    $table->dropColumn('event_id');
                }
            });
        }
    }
}
