<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    use HasFactory;
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $fillable=[
        'libelle',
        'statut',
    ];

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function disciplineClasses()
    {
        return $this->hasMany(DisciplineClasse::class);
    }
}
