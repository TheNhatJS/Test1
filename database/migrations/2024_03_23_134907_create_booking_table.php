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
        Schema::create('tbl_booking', function (Blueprint $table) {
            $table->increments('bookingID');
            $table->unsignedInteger('userID');
            $table->unsignedInteger('roomID');
            $table->date('checkInDate');
            $table->date('checkOutDate');
            $table->unsignedInteger('odCountPeople');
            $table->text('note')->nullable();
            $table->timestamps();
            

            $table->foreign('userID')->references('userID')->on('tbl_user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('roomID')->references('roomID')->on('tbl_room')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('bookingID')->references('bookingID')->on('tbl_bill')->onDelete('cascade')->onUpdate('cascade');

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_booking');
    }
};
