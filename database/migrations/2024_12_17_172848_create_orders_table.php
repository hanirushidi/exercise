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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->decimal('total', 8, 2); // Total amount for the order
            $table->timestamps();
        });

        // Create pivot table for many-to-many relationship between orders and products
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');  // Foreign key to orders table
            $table->unsignedBigInteger('product_id');  // Foreign key to products table
            $table->integer('quantity');  // Quantity of the product in the order
            $table->decimal('total', 8, 2); // For storing the total amount
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the pivot table first
        Schema::dropIfExists('order_product');
        
        // Drop the orders table
        Schema::dropIfExists('orders');
    }
};
