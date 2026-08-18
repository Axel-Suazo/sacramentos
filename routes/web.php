<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\SacramentController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Sistema de autenticación
|--------------------------------------------------------------------------
*/

// 🔐 Rutas de inicio de sesión
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rutas del sistema — protegidas con autenticación
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Redirige raíz al listado de personas
    Route::get('/', fn () => redirect()->route('personas.index'));

    // CRUD de personas
    Route::resource('personas', PersonaController::class);

    // 👇 Rutas anidadas: sacramentos dentro de cada persona
    Route::resource('personas.sacramentos', SacramentController::class)->shallow();

    // Exportar en PDF y Word
    Route::get('/personas/{persona}/pdf', [PersonaController::class, 'pdf'])->name('personas.pdf');
    Route::get('/personas/{persona}/export-word', [PersonaController::class, 'exportWord'])->name('personas.exportWord');

    // 📜 Constancia individual de Bautismo
    Route::get('/sacramentos/{id}/constancia-bautismo', [SacramentController::class, 'constanciaBautismo'])
    ->name('sacramentos.constancia.bautismo');
// 📜 Constancia individual de confirmacion
    Route::get('/sacramentos/{id}/constancia-confirmacion', [SacramentController::class, 'constanciaConfirmacion'])
    ->name('sacramentos.constancia.confirmacion');
// 📜 Constancia individual de matrimonio
    Route::get('/sacramentos/{id}/constancia-matrimonio', [SacramentController::class, 'constanciaMatrimonio'])
    ->name('sacramentos.constancia.matrimonio');
// 📜 Constancia individual de comunion
    Route::get('/sacramentos/{id}/constancia-comunion', [SacramentController::class, 'constanciaComunion'])
    ->name('sacramentos.constancia.comunion');


});
