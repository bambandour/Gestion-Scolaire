<?php

namespace App\Http\Controllers;

// use App\Traits\JoinQueryParams;
use App\Models\Niveaux;
use App\Models\Classe;
use App\Http\Resources\ClasseResource;
use App\Http\Resources\NiveauxResource;
use App\Models\Event;
use App\Traits\JoinQueryParams;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class NiveauxController extends Controller
{
    use JoinQueryParams;
    public function index(Request $request){
        
        $niveaux=Niveaux::with('classes')->get();
        return NiveauxResource::collection($niveaux);
    }
    public function showLevel(Request $request){
        if ($request->join){
            return NiveauxResource::collection($this->join(Niveaux::class, $request->join)->get());
        }
        else{
            return NiveauxResource::collection(Niveaux::all());
        }
    }
    public function store(Request $request){

        $joinClasses = $request->query('join');
        $niveau = $request->query('niveau');

        $query = Niveaux::query();

        if ($joinClasses === 'classes') {
            $query->with('classes');
            // $query->load('classes');
        }

        if ($niveau) {
            $query->where('libelle', $niveau);
        }

        $result = $query->get();
        return $result;
        // return NiveauxResource::collection($result);
    }

    // public function showLevel(){
    // }
    
    public function findLevel(Niveaux $id){
        // $niveaux=Niveaux::find($id);
        return new NiveauxResource($id->load('classes'));
    }

    public function essaie(){
       return  $this->test();
    }
}