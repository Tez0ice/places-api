<?php

use Hamcrest\Xml\HasXPath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PassportAuthController;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [PassportAuthController::class, 'register']);
Route::post('/login', [PassportAuthController::class, 'login']);


// Routes protected by auth:sanctum middleware
Route::middleware('jwt.auth')->group(function () {
    // Create
    Route::post('/places',[PlaceController::class, 'store']);
    // Read
    
    // Update
    Route::put('/places/{id}',[PlaceController::class,'update']);
    // Delete
    Route::delete('/places/{id}',[PlaceController::class,'delete']);

    Route::post('/places/{id}/reviews',[ReviewController::class, 'store']);

});



Route::get('/hello',function(){
    return "<h1>Selamat Pagi Dunia!!!!<h1>";
});


Route::get("/goodbye/{name}",function($name){
    return "Selamat Tinggal ". $name; 
});


Route::post('/info',function(Request $request){
    return "Hello " . $request['name'] . ' you are ' . $request['age'] . ' years old'; 
});


Route::get('/places',[PlaceController::class, 'index']);
Route::get('/places/{id}',[PlaceController::class, 'show']);


// database could be serve as two purpose. save data to db or db normalization (converting existential data to db).

// one of the way to decide on the db decide on the table, properties(fields) and relationship this can be look on the ui.
// why ui? because normally development came after ui. as a developer you should have the skill to understand what the db should have just by looking on the ui.

