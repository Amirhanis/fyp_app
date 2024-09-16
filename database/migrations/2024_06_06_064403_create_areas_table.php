<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->decimal('price', 8, 2);
            $table->integer('num_days');
            $table->unsignedBigInteger('country_id');
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('states')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
