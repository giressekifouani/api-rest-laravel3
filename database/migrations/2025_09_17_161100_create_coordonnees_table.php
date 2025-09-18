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
        Schema::create('coordonnees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idpays');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->string('adresse');
            $table->string('ville');
            $table->string('codepostal');
            $table->foreign('idpays')->references('id')->on('pays')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordonnees');
    }
};
