<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('utilisateurs', "App\Http\Controllers\UtilisateurController@index"); // List utilisateur
Route::post('utilisateurs', "App\Http\Controllers\UtilisateurController@store"); // Create utilisateur
Route::get('utilisateurs/{id}', "App\Http\Controllers\UtilisateurController@show"); // Detail of utilisateur
Route::put('utilisateurs/{id}', "App\Http\Controllers\UtilisateurController@update"); // Update utilisateur
Route::delete('utilisateurs/{id}', "App\Http\Controllers\UtilisateurController@destroy"); // Delete utilisateur
