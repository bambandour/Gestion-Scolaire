<?php

use App\Models\Semestre;
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
        Schema::table('classe_disciplines', function (Blueprint $table) {
                $table->foreignIdFor(Semestre::class)->constrained('semestres')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_disciplines');

        // Schema::table('classe_disciplines', function (Blueprint $table) {
        //     $table->dropForeignIdFor(Semestre::class, 'semestre_id');
        // });
    }
};
