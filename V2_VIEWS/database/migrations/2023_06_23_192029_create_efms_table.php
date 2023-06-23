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
        Schema::create('efms', function (Blueprint $table) {
            $table->id();
            $table->string('codemodule');
            $table->string('note');
            $table->string('coef');
            $table->unsignedBigInteger('etudiant_id');
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
        Schema::dropIfExists('efms');
    }
};
