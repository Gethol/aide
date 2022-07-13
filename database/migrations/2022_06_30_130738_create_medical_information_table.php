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
        Schema::create('medical_information', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');

            $table->string('national_id')->unique();
            $table->string('emergency_contact_name');
            $table->string('emergency_contact');
           
            
            $table->date('yob');
            $table->string('blood_type');
            
            
            
            $table->text('medical_conditions');
            $table->text('allergies')->nullable();
            $table->text('other')->nullable();



            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_information');
    }
};
