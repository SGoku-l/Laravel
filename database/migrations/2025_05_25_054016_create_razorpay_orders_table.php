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
        Schema::create('razorpay_orders',function(Blueprint $table){

            $table->id();
            $table->string('order_id');
            $table->string('payment_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('amount');
            $table->string('status');
            $table->string('paid_at');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('razorpay_orders');
    }
};
