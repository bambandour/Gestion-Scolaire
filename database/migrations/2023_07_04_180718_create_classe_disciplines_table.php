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
        Schema::create('classe_disciplines', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Discipline::class)->constrained('disciplines')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Evaluation::class)->constrained('evaluations')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Classe::class)->constrained('classes')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\AnneeScolaire::class)->constrained('annee_scolaires')->cascadeOnDelete();
            $table->float('note_max')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_disciplines');
    }
};
