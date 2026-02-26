<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeneficioController; // Importante añadir el nuevo controlador
use Illuminate\Support\Facades\Route;

Route::get('/', [EventoController::class, 'index'])->name('inicio');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('eventos', EventoController::class)->except(['index']);
    Route::post('/eventos/{evento}/unirse', [EventoController::class, 'unirse'])->name('eventos.unirse');

    Route::resource('especies', EspecieController::class);

    Route::resource('beneficios', BeneficioController::class);

    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::get('/eventos-pendientes', [App\Http\Controllers\AdminController::class, 'eventosPendientes'])->name('admin.eventos');
        Route::patch('/eventos/{evento}/aprobar', [App\Http\Controllers\AdminController::class, 'aprobarEvento'])->name('admin.eventos.aprobar');
    });
});

Route::get('/logros', [App\Http\Controllers\LogroController::class, 'index'])->name('logros.index');
Route::get('/nosotros', [App\Http\Controllers\PaginasController::class, 'about'])->name('about');
Route::get('/contacto', [App\Http\Controllers\PaginasController::class, 'contacto'])->name('contacto');
Route::post('/contacto', [App\Http\Controllers\PaginasController::class, 'enviarContacto'])->name('contacto.enviar');

require __DIR__.'/auth.php';
