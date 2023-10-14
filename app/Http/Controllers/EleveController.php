<?php

namespace App\Http\Controllers;

use App\Http\Requests\ElevePutRequest;
use \App\Http\Resources\EleveResource;
use \App\Models\Eleve;
use \App\Models\AnneeScolaire;
use \App\Models\Inscription;
use Illuminate\Http\Request;
use \App\Http\Requests\EleveRequest;
use \App\Http\Requests\InscriptionRequest;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class EleveController extends Controller
{
    // public $student;
    // public function __construct(){
    //     $this->student = new Eleve();
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eleve=Eleve::all();
        return EleveResource::collection($eleve);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EleveRequest  $request , InscriptionRequest $request1)
    {
        DB::beginTransaction();
        try{
        $eleve = new Eleve;
        $eleve->nom = $request->input('nom');
        $eleve->prenom = $request->input('prenom');
        $eleve->date_naissance = $request->input('date_naissance');
        $eleve->lieu_naissance = $request->input('lieu_naissance');
        $eleve->sexe = $request->input('sexe');
        $eleve->profil = $request->input('profil');
        if($eleve->profil == 1){
            $eleve->numero= Eleve::genereNumbers();
        }
        $eleve->email=$request->email;
        $eleve->statut=1;
        $eleve->save();
        
        $annee =AnneeScolaire::where('etat', 1)->first();
        $inscription = new Inscription;
        $inscription->eleve_id = $eleve->id;
        $inscription->classe_id = $request1->classe_id;
        $inscription->annee_scolaire_id=$annee->id;
        $inscription->date_inscription = now();
        $inscription->save();
        DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return [
            'statusCode' => Response::HTTP_OK,
            'message' => 'inscription reussi',
            'data'   => [$eleve,$inscription],
        ];        
    }
    public function sortie(Request $request){
        $eleveIds = $request->eleve_ids;
        Eleve::sortie($eleveIds,0);
        return [
            'statusCode' => Response::HTTP_ACCEPTED ,
            'message' => 'Le statut des élèves a été modifié avec succès.',    
        ];
    }

    

    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
