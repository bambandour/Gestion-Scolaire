<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisciplinePostRequest;
use App\Http\Requests\ClasseDisciplinePostRequest;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\ClasseDiscipline;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class DisciplineController extends Controller
{
    public function store(DisciplinePostRequest $request , ClasseDisciplinePostRequest $request1, Classe $classe_id){

        DB::beginTransaction();

        try{
        // $discipline = new Discipline();
        // $discipline->libelle = $request->libelle;
        // $discipline->code = $request->code;
        // $discipline->save();
        
        $annee =AnneeScolaire::where('etat', 1)->first(); 
        $classeDiscipline = new ClasseDiscipline();
        $classeDiscipline->discipline_id = $request1->discipline->id;
        $classeDiscipline->evaluation_id = $request1->evaluation_id->id;
        $classeDiscipline->classe_id = $request1->$classe_id;
        $classeDiscipline->annee_scolaire_id=$annee->id;
        $classeDiscipline->note_max=$request1->note_max;   
        $classeDiscipline->semestre_id=$request1->semestre_id;
        $classeDiscipline->save();
        DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return [
            'statusCode' => Response::HTTP_OK,
            'message' => 'classeDiscipline reussi',
            'data'   => [$classeDiscipline],
        ];
    }
}
