<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('service_id') // Utilisez 'service_id' pour la clé étrangère
                  ->constrained('services')
                  ->onDelete('cascade'); // Ajoute une contrainte de suppression en cascade
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}

