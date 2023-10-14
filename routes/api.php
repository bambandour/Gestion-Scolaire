<?php

use App\Http\Controllers\EleveController;
use \App\Http\Controllers\NiveauxController;
use \App\Http\Controllers\ClasseController;
use App\Http\Controllers\ClasseDisciplineController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('breukh-api')->group(function () {

    Route::get('/niveaux', [NiveauxController::class, 'index']);
    Route::get('/level', [NiveauxController::class, 'showLevel']);
    Route::get('/test', [NiveauxController::class, 'essaie']);
    Route::get('/niveaux', [NiveauxController::class, 'store']);
    Route::get('/niveaux/{id}', [NiveauxController::class, 'findLevel']);

    Route::get('/classes', [ClasseController::class,'index']);
    Route::get('/classes/{classeId}/eleves', [InscriptionController::class, 'GetElevesByClasse']);
    Route::post("/classes/{classe_id}/coef", [DisciplineController::class, "store"]);
    Route::post('/classes/{classe_id}/disciplines/{discipline_id}/evaluations/{evaluation_id}',[NoteController::class, 'PostNote']);
    Route::put('/classes/{classe_id}/disciplines/{discipline_id}/evaluations/{evaluation_id}/eleve/{eleve_id}',[NoteController::class, 'PutNote']);
    Route::get('/classes/{classe_id}/disciplines/{discipline_id}/notes',[NoteController::class, 'getNotesByClasseDiscipline']);
    Route::get('/classes/{classe_id}/notes',[NoteController::class, 'getNotesByClasse']);
    Route::get('/classes/{classe_id}/notes/eleves/{eleve_id}',[NoteController::class, 'getNotesEleveByClasse']);
    Route::get('/classes/{classe_id}/participants',[ClasseController::class, 'getClasseParticipants']);

    Route::get('/eleves', [EleveController::class,'index']);
    Route::put('/eleves/sortie', [EleveController::class ,'sortie']);

    Route::post('/disciplines', [ClasseController::class, 'getDiscipline']);

    Route::get('/evenements', [EventController::class,'index']);
    Route::post('/evenements', [EventController::class,'store']);
    Route::post('/evenements/{event_id}/participants', [ParticipantController::class,'store']);

    Route::resource("/users", UserController::class);
    Route::post("/users", [UserController::class,'store'])->name('addUsers');
    Route::get("/users", [UserController::class,'index'])->name('showUsers');
    // Route::get("/users/{id}", [UserController::class,'show'])->name('showUser');
    // Route::put("/users/{id}", [UserController::class,'update'])->name('updateUser');
    // Route::delete("/users/{id}", [UserController::class,'destroy'])->name('deleteUser');
    Route::get("/users/{user_id}/events", [UserController::class,'getEventsByUsers'])->name('getEventsByUsers');


});

Route::apiResource('eleves',EleveController::class)->only(['store']);

// Route::apiResource('/disciplines', DisciplineController::class)->only(['getDiscipline']);







// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
