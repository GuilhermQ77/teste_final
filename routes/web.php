<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicacaoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AvaliacaoController;
use App\Models\Publicacao;
use App\Models\Usuario;

// Route::get('/', [PublicacaoController::class, 'publicacoes'])->name('publicacao.index');
Route::get('/', [PublicacaoController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('publicacaos', PublicacaoController::class);
    Route::resource('empresa', EmpresaController::class);

   
});
Route::post('/like', [PublicacaoController::class, 'like'])->name('like');
Route::post('/dislike', [PublicacaoController::class, 'dislike'])->name('dislike');
Route::get('/publicacoes', [PublicacaoController::class, 'index'])->name('publicacoes.index');
Route::resource('index', PublicacaoController::class);


require __DIR__ . '/auth.php';
