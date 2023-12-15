<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagecontroller;
use App\Http\Controllers\PostController;
// De esta manera podremos aislar la lógica, 
//ahora el manejo de peticiones se realiza mediante el controlador
route::controller(pagecontroller::class)->group(function () {
// De esta manera eliminamos el aseso al controlador
// Nos quedamos de manera directa con la ruta y el metodo
    Route::get('/',                            'home')->name('home');
    Route::get('estudiante',                   'estudiante')->name('estudiante');
    Route::get('administrador/{post:slug}',    'post')->name('post');
    Route::get('buscar',                       'buscar');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('estudiante', [PostController::class, 'guardarEstudiante'])->name('guardarEstudiante');
// Route::post('generate-estudiante', [PostController::class, 'generate'])->name('generate');
Route::get('export', [PostController::class, 'export'])->name('export');
Route::resource('posts', PostController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';