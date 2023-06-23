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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->date('dateinscription');
            $table->unsignedBigInteger('filiere_id');
            $table->unsignedBigInteger('etudiant_id');
            $table->foreign('filiere_id')->references('id')->on('filieres')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('etudiant_id')->references('id')->on('etudiants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
