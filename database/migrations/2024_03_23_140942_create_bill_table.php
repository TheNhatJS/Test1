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
        Schema::create('tbl_bill', function (Blueprint $table) {
            $table->increments('billID');
            $table->unsignedInteger('bookingID');
            $table->unsignedInteger('userID');
            $table->integer('pay');
            $table->dateTime('create');
            $table->dateTime('update');

            $table->timestamps();

            $table->foreign('bookingID')->references('bookingID')->on('tbl_booking')->onDelete('cascade')->onUpdate('cascade'); 
            // Nếu booking xóa thì bill bị xóa theo, nếu bill xóa thì booking vẫn còn
            $table->foreign('userID')->references('userID')->on('tbl_user')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_bill');
    }
};
