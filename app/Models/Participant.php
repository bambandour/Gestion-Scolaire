<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'event_id',
        'classe_id',
    ];

    public function classes(){
        return $this->belongsTo(Classe::class,'classe_id');
    }
    
    public function events(){
        return $this->belongsTo(Event::class);
    }
    
}
