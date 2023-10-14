<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable=[
        'eleve_id',
        'classe_id',
        'annee_scolaire_id',
        'date_inscription',
    ];

    protected $guarded =[
        'id'
    ];
    
    public function eleves(){
        return $this->belongsTo(Eleve::class,'eleve_id');
    }

    public function classes()
    {
        return $this->belongsTo(Classe::class,'classe_id');
    }
    public function anneeScolaires()
    {
        return $this->belongsTo(AnneeScolaire::class,'annee_scolaire_id');
    }
    public function classeDiscipline()
    {
        return $this->belongsTo(ClasseDiscipline::class, 'classe_discipline_id', 'id');
    }
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
