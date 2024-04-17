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
        Schema::create('tbl_room', function (Blueprint $table) {
            $table->increments('roomID');
            $table->string('name');
            $table->string('type');
            $table->unsignedBigInteger('price');
            $table->integer('countPeople');
            $table->tinyInteger('status')->default(1);
            $table->text('info');
            $table->string('image');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_room');
    }
};
