<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classe extends Model
{
    use HasFactory;
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $guarded =[
        'id'
    ];
    public function niveaux()
    {
        return $this->belongsTo(Niveau::class);
    }
    
    public function inscriptions() :HasMany
    {
        return $this->hasMany(Inscription::class);
    }

    public function eleves(){
        return $this->belongsToMany(Eleve::class, 'inscriptions');
    }

    public function participantsClasses()
    {
        return $this->hasMany(\App\Models\Participant::class);
    }
}
