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
            Schema::create('consultations_medicament', function (Blueprint $table) {
                $table->unsignedBigInteger('medicamentID');
                $table->foreign('medicamentID')->references('id')->on('medicaments');
                $table->unsignedBigInteger('consultationsID');
                $table->foreign('consultationsID')->references('id')->on('consultations');
            });
        }
    
        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('consultations_medicament');
        }
    


};
