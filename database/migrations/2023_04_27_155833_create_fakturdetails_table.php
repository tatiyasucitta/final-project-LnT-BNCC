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
            $table->string('invoice');
            $table->string('itemName');
            $table->unsignedBigInteger('itemId');
            $table->bigInteger('quantity');
            $table->string('address', 100);
            $table->string('postal', 5);
            $table->foreign('invoice')
            ->references('invoice')
            ->on('fakturs')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('itemId')
            ->references('id')
            ->on('items')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
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
