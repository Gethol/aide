<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('first_aid_instructions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longtext('symptoms');
            $table->longtext('treatment');
            $table->string('image');
            $table->string('video');
            $table->unsignedBigInteger('author');
            $table->timestamps();
        
            $table->foreign('author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('first_aid_instructions');
    }
};
