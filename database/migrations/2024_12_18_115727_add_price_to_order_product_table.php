<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('order_product', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->after('quantity'); // Adding the price column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('order_product', function (Blueprint $table) {
            $table->dropColumn('price'); // Dropping the price column
        });
    }
};
