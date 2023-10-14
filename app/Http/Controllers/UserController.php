<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostrequest;
use App\Http\Resources\UserResource;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index()
    {
        return [
            'statusCode' => Response::HTTP_OK,
            'message' => 'Le liste des users',
            'data' => User::all()
        ];
    }
    public function store(Request $request)
    {
        
        $user = User::create([
            'nomComplet' => $request->nomComplet,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return [
            'statusCode' => Response::HTTP_CREATED,
            'message' => 'l\'utilisateur a été ajouté avec succes',
            'data'   => $user
        ];
    }
    public function getEventsByUsers(Request $request, $user_id){
        $user = User::find($user_id);        
        if (!$user) {
            return response()->json(['message' => 'Utilisateur introuvable.'], 404);
        }
        // $events = $user->events;
        $events=Event::where('user_id',$user_id)->first();
        return response()->json(['user' => $user, 'events' => $events]);
    }

    public function show(User $id){
        // return new UserResource($id);
        return [
            'statusCode' => Response::HTTP_OK ,
            'message' => 'Les informations:' ,
            'data'   => new UserResource($id)
        ];
    }
    public function update(Request $request,User $user){
        $user->update(
            $request->only('nomComplet', 'email', 'role')
        );
        return [
            'statusCode' => Response::HTTP_ACCEPTED ,
            'message' => 'Mise à jour reussi' ,
            'data'   => $user
        ];
    }
    public function destroy(User $user){
        $user->delete();
        // dd($user);
        return response(null, Response::HTTP_NO_CONTENT);
    }



}
