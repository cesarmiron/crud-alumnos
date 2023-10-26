<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('get-alumno', [\App\Http\Controllers\AlumnoController::class, 'getAll'])->name( 'api-getAll');
Route::put('save-alumno', [AlumnoController::class, 'saveAlumno'])->name('api-saveAlumno');
Route::delete('delete-alumno/{id}', [AlumnoController::class, 'deleteAlumno'])->name('api-deleteAlumno');
Route::post('edit-alumno/{id}', [AlumnoController::class, 'editAlumno'])->name('api-editAlumno');

// Registro de usuario
//Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'register']);

// Inicio de sesión
//Route::post('/login', 'Auth\LoginController@login');
Route::post('login', [LoginController::class, 'login']);

// Cierre de sesión
//Route::post('/logout', 'Auth\LoginController@logout');
Route::get('logout', [LoginController::class, 'logout']);


//RUTAS PROTEGIDAS POR SANCTUM
Route::middleware(['auth:sanctum'])->group(function (){

    Route::get('get-alumno', [\App\Http\Controllers\AlumnoController::class, 'getAll'])->name( 'api-getAll');
    Route::put('save-alumno', [AlumnoController::class, 'saveAlumno'])->name('api-saveAlumno');
    Route::delete('delete-alumno/{id}', [AlumnoController::class, 'deleteAlumno'])->name('api-deleteAlumno');
    Route::post('edit-alumno/{id}', [AlumnoController::class, 'editAlumno'])->name('api-editAlumno');

// Cierre de sesión
//Route::post('/logout', 'Auth\LoginController@logout');
    Route::get('logout', [LoginController::class, 'logout']);

});
