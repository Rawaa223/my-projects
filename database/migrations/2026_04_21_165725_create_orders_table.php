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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_Address');
            $table->string('customer_phone');
            $table->string('Food_name');
            $table->string('Food_type');
            $table->string('Food_image');
            $table->integer('Food_price');
            $table->integer('Food_quantity');    
            $table->string('order_status')->default('in progress');


            $table->timestamps();
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
