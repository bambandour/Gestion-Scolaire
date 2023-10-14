<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisciplinePostRequest;
use App\Http\Resources\ClasseResource;
use App\Http\Resources\DisciplineResource;
use App\Http\Resources\EleveResource;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Discipline;
use App\Models\Inscription;
use App\Models\Niveaux;
use Symfony\Component\HttpFoundation\Response;

class ClasseController extends Controller
{
    public function index(){
        $classes=Classe::all();
        return ClasseResource::collection($classes);
    }

    public function store(DisciplinePostRequest $request){

        $disciplines=Discipline::create([
           "libelle" => $request->libelle,
           "code" => $request->code 
        ]);

        // return [
        //     'statusCode' => Response::HTTP_OK,
        //     'message' => 'inscription reussi',
        //     'data'   => [$disciplines],
        // ];
        
        return DisciplineResource::collection($disciplines);
    }

    public function getDiscipline(DisciplinePostRequest $request)
    {
 
    $discipline = new Discipline();
    $discipline->libelle = $request->libelle;
    $discipline->code = $request->code;

    $discipline->save();

    return [
        'statusCode' => Response::HTTP_OK,
        'message' => 'La discipline a été ajoutée avec succès',
        'data'   => [$discipline],
    ];
    }
    public function getClasseParticipants(Request $request, $classe_id)
    {
        $classe = Classe::with('eleves')->find($classe_id);
        // dd($classe);
        // $ins=Inscription::where('classe_id',$classe)->first();
        // dd($ins);

        if (!$classe){
        
            return response()->json(['message' => 'Classe non trouvée'], 404);
        }
        $participants = $classe->eleves()->get();

        return response()->json(['participants' => $participants]);
    }

}
