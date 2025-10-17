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
        // This migration is superseded by 2025_10_14_093443_modify_orders_table_structure.php
        // which creates the complete orders table structure
        // Keeping this for migration history but doing nothing
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // This migration is superseded - no action needed
    }
}
