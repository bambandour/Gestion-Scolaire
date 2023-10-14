<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveaux extends Model
{
    use HasFactory;
    protected $table = 'niveaux';
    public function classes()
    {
        return $this->hasMany(Classe::class);
    }
}
