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
            $table->string('dateinscription');
            $table->unsignedBigInteger('filiere_id');
            $table->unsignedBigInteger('etudiant_id');
            $table->foreign('filiere_id')->references('filieres')->on('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('etudiant_id')->references('etudiants')->on('id')
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
