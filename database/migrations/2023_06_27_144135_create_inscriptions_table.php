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
            $table->foreignIdFor(\App\Models\Eleve::class)->constrained('eleves')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Classe::class)->constrained('classes')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\AnneeScolaire::class)->constrained('annee_scolaires')->cascadeOnDelete();
            $table->dateTime('date_inscription')->nullable();
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
