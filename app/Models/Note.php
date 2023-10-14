<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;
    protected $fillable = [
        'classe_discipline_id',
        'inscription_id',
        'note',
        'semestre_id',
    ];

    protected $guarded =[
        'id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function classeDiscipline():BelongsTo
    {
        return $this->belongsTo(ClasseDiscipline::class,'classe_discipline_id','id');
    }
    public function inscriptions():BelongsTo
    {
        return $this->belongsTo(Inscription::class,'inscription_id');
    }

    

}
