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
        Schema::create('tbl_booking_history', function (Blueprint $table) {
            $table->increments('historyID');
            
            $table->string('nameRoom');
            $table->string('nameUser');
            $table->date('checkIn');
            $table->date('checkOut');
            $table->integer('payRoom');
            $table->dateTime('create');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_booking_history');
    }
};
