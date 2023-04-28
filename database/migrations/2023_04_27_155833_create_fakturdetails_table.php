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
        Schema::create('fakturdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice');
            $table->unsignedBigInteger('itemId');
            $table->bigInteger('quantity');
            $table->foreign('invoice')
            ->references('id')
            ->on('fakturs')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('itemId')
            ->references('id')
            ->on('items')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();

            // $table->id();
            // $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('product_id');
            // $table->timestamps();
    
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakturdetails');
    }
};
