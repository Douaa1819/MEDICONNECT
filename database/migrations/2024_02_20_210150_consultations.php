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
        Schema::disableForeignKeyConstraints();
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointementID');
            $table->foreign('appointementID')->references('id')->on('reservations');
            $table->unsignedBigInteger('patientID');
            $table->foreign('patientID')->references('id')->on('patients');
            $table->unsignedBigInteger('doctorID');
            $table->foreign('doctorID')->references('id')->on('doctors');
            $table->integer('nbmrJour');          
            $table->longText('description');
            $table->timestamps();
        });
    }


    
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};

    /**
     * Reverse the migrations.
     */

