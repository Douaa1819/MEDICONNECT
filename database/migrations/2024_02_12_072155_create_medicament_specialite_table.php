<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentSpecialiteTable extends Migration
{
    public function up()
    {
        Schema::create('medicament_specialite', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicament_id')->constrained()->onDelete('cascade');
            $table->foreignId('specialite_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicament_specialite');
    }
}
