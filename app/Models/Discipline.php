<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\DisciplineClasse;

class Discipline extends Model
{
    use HasFactory;
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'libelle',
        'code'  
    ];
    public function disciplineClasses()
    {
        return $this->hasMany(DisciplineClasse::class);
    }
}
