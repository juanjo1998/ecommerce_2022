<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_size', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('size_id');
            $table->timestamps();

            // ! foreign key

            $table->foreign('color_id')
            ->references('id')
            ->on('colors')
            ->onDelete('cascade');

            $table->foreign('size_id')
            ->references('id')
            ->on('sizes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_size');
    }
}
