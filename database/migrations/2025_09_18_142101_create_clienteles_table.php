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
        Schema::create('clienteles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idpersonne');
            $table->unsignedBigInteger('idcoordonnees');
            $table->string('secteuractivite');
            $table->enum('typeclient', ['particulier', 'entreprise', 'acheteur', 'revendeur', 'administration public', 'distributeur'])->default('particulier');
            $table->foreign('idpersonne')->references('id')->on('personnes')->onDelete('cascade');
            $table->foreign('idcoordonnees')->references('id')->on('coordonnees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clienteles');
    }
};
