<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClasseDisciplinePostRequest;
use App\Models\ClasseDiscipline;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;


class ClasseDisciplineController extends Controller
{
    public function store(ClasseDisciplinePostRequest $request){
        $classediscipline = new Classediscipline();
        $classediscipline->classe_id = $request->classe_id;
        $classediscipline->discipline_id = $request->discipline_id;
        $classediscipline->evaluation_id = $request->evaluation_id;
        $classediscipline->annee_scolaire_id = $request->annee_scolaire_id;
        $classediscipline->note = $request->note;
        $classediscipline->note_max = $request->note_max;

        $classediscipline->save();

        return [
            'statusCode' => Response::HTTP_OK,
            'message' => 'La discipline a été ajoutée avec succès',
            'data'   => [$classediscipline],
        ];
    }

    // public function getDisciplineByClasse(){
        
    // }
}
