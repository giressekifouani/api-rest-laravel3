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
        Schema::create('personnes', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('idcoordonnees');
            $table->string('prenom');
            $table->string('nom');
            $table->enum('sexe', ['Masculin', 'Feminin'])->default('Masculin');
            $table->date('datenaissance');
            $table->string('lieunaissance');
            $table->string('numeropiece')->unique();
            // $table->foreign('idcoordonnees')->references('id')->on('coordonnees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnes');
    }
};
