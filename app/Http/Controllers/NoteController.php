<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\ClasseDiscipline;
use App\Models\Discipline;
use App\Models\Eleve;
use App\Models\Event;
use App\Models\Inscription;
use App\Models\Note;
use App\Models\Semestre;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;

class NoteController extends Controller
{

    public function PostNote(NoteRequest $request, $classe_id, $discipline_id,$evaluation_id){

        $classe_disciplines=ClasseDiscipline::where('discipline_id',$discipline_id)
                    ->where('evaluation_id',$evaluation_id)
                    ->where('classe_id',$classe_id)
                    ->where('semestre_id',1)
                    ->first();
                    $noteMax = $classe_disciplines->note_max;
                    $notes=$request->all();
                    $addNotes = [];
                    foreach($notes as $note){
                        if($note['note']<0 || $noteMax<$note['note']){
                            $badNotes=$note;
                            return "false!!!";
                        }else{
                        $all=Note::create([
                            'classe_discipline_id'=>$classe_disciplines->id,
                            'inscription_id'=>$note['inscription_id'],
                            'note'=>$note['note'],
                            'semestre_id'=>$note['semestre_id'],
                        ]);
                        }
                    $addNotes[]=$all;
                    }
                    
        return $addNotes;
    }

    public function getNotesByClasseDiscipline($classe_id,$discipline_id){

        $classe_discipline =ClasseDiscipline::where(
           ['classe_id'=>$classe_id,'discipline_id'=>$discipline_id,'semestre_id'=>1,'annee_scolaire_id'=>1]
           )->get()->pluck('id');
        $notes=Note::whereIn('classe_discipline_id',$classe_discipline)
                    ->get();
                    // dd($notes);
                    $noteByEleves=$notes->groupBy('inscription_id')->map(function($noteByEleves){
                        // dd($noteByEleves);
                        return $noteByEleves->map(function($note){
                            $eleve = Eleve::find($note->inscription_id);
                            dd($note);
                        });
        
                    });
        }

    public function getNotesEleveByClasse(NoteRequest $request ,$classe_id,$eleve_id){
        $notes = Note::where('inscription_id', $eleve_id)
            ->whereHas('classeDiscipline', function ($query) use ($classe_id){
                $query->where('classe_id', $classe_id);
            })->get();
        return NoteResource::collection($notes);
    }
    public function getNotesByClasse(Request $request, $classe_id)
    {
        $notes = Note::whereHas('classeDiscipline', function ($query) use ($classe_id) {
            $query->where('classe_id', $classe_id);
        })->get();
        return NoteResource::collection($notes);

        //Autres methodes
        // $ins=Inscription::where('classe_id', $classe_id)->get()->pluck('id');
        // $notes=Note::whereIn('inscription_id', $ins)->get();
        // return NoteResource::collection($notes);
    }
}
