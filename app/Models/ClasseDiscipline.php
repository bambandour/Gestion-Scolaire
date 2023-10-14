<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasseDiscipline extends Model
{
    use HasFactory;
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $table='classe_disciplines';

    protected $fillable=[
        'classe_id',
        'discipline_id',
        'evaluation_id',
        'annee_scolaire_id',
        'note_max',
        'semestre_id',
    ];

    protected $guarded =[
        'id'
    ];
    
    public function disciplines()
    {
        return $this->belongsTo(\App\Models\Discipline::class,'discipline_id');
    }
    public function classes()
    {
        return $this->belongsTo(\App\Models\Classe::class,'classe_id');
    }
    public function evaluations()
    {
        return $this->belongsTo(\App\Models\Evaluation::class,'evaluation_id');
    }
    public function annneeScolaires()
    {
        return $this->belongsTo(AnneeScolaire::class,'annee_scolaire_id');
    }
    public function semestres()
    {
        return $this->belongsTo(Semestre::class,'semestre_id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class,'classe_discipline_id', 'id');
    }
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'classe_discipline_id', 'id');
    }
}


