<?php

namespace App\Models;
use App\Models\Inscription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Eleve extends Model
{
    use HasFactory,Notifiable;
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public $eleve;
    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'lieu_naissance',
        'sexe',
        'profil',
        'email',
    ];

    public function __construct(){

    }
    
    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }

    

    public function classes(){
        return $this->belongsToMany(\App\Models\Classe::class, 'inscriptions');
    }

    public static function genereNumbers()
    {
        $currentNumber = Eleve::where('profil', 1)
                            ->orderBy('numero', 'asc')
                            ->pluck('numero')
                            ->toArray(); 
        $lastNumber = 0;
        foreach ($currentNumber as $numero) {
            if ($numero > $lastNumber + 1) {
                return $lastNumber + 1;
            }
            $lastNumber = $numero;
        }
        return $lastNumber + 1;
    }

    public function scopeSortie(Builder $builder, array $eleveIds, $sens){
        return $builder->whereIn('id', $eleveIds)
        ->update(['statut' => $sens]);
    }


   
    // public function genereNumbers(){
    //     $eleveAvecNumero = Eleve::
    //         where('profil', 1)
    //         ->where('statut', 0)
    //         ->orderBy('numero', 'asc')
    //         ->first();
    //         if ($eleveAvecNumero) {
    //             $numeroInscription = $eleveAvecNumero->numero;
    //             // $eleveAvecNumero->update(['statut' => -1]);
    //         } else {
    //             $eleveAvecNumero = Eleve::
    //                 where('profil', 1)
    //                 ->orderBy('numero', 'desc')
    //                 ->first();      
    //                 if ($eleveAvecNumero) {
    //                     $numeroInscription = $eleveAvecNumero->numero + 1;

    //                 } else {
    //                     $numeroInscription = 1;
    //                 }
    //         }

    //     return $numeroInscription;                                    
   
    //     }    
}

