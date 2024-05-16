<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarrioController;
use App\Http\Controllers\AuthClientController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\InconsistenciaSuministroController;
use App\Http\Controllers\HomeClientController;
use App\Http\Controllers\ProblemaBarrioController;
use App\Models\Horario;


Route::get('/', function () {
    return view('client.index');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// CRUD de Sector
Route::prefix('admin/crudSector')->name('sector.')->group(function () {
    Route::get('/index', [SectorController::class, 'index'])->name('index');
    Route::get('/create', [SectorController::class, 'create'])->name('create');
    Route::post('/store', [SectorController::class, 'store'])->name('store');
    Route::get('/{sector}/edit', [SectorController::class, 'edit'])->name('edit');
    Route::put('/{sector}/update', [SectorController::class, 'update'])->name('update'); // Ruta para actualizar el sector
    Route::delete('/{sector}', [SectorController::class, 'destroy'])->name('destroy');
});

// CRUD de Barrios
Route::get('/admin/crudBarrio/index', [BarrioController::class, 'index'])->name('barrio.index');
Route::get('/admin/crudBarrio/create', [BarrioController::class, 'create'])->name('barrio.create');
Route::post('/admin/crudBarrio', [BarrioController::class, 'store'])->name('barrio.store');
Route::get('/{barrio}/edit', [BarrioController::class, 'edit'])->name('barrio.edit');
Route::put('/{barrio}/update', [BarrioController::class, 'update'])->name('update'); // Ruta para actualizar el barrio
Route::delete('/{barrio}', [BarrioController::class, 'destroy'])->name('barrio.destroy');

// CRUD de Horarios
Route::get('/admin/crudHorario/index', [HorarioController::class, 'index'])->name('horario.index');
Route::get('/admin/crudHorario/create', [HorarioController::class, 'create'])->name('horario.create');
Route::post('/admin/crudHorario', [HorarioController::class, 'store'])->name('horario.store');
Route::get('/admin/crudHorario/{id}/edit', [HorarioController::class, 'edit'])->name('horario.edit');
Route::put('/admin/crudHorario/{id}/update', [HorarioController::class, 'update'])->name('horario.update');
Route::delete('/admin/crudHorario/{id}', [HorarioController::class, 'destroy'])->name('horario.destroy');

// CRUD de Inconsistencias del suministro
Route::get('/admin/crudInconsistencia/index', [InconsistenciaSuministroController::class, 'index'])->name('inconsistencia.index');
Route::get('/admin/crudInconsistencia/create', [InconsistenciaSuministroController::class, 'create'])->name('inconsistencia.create');
Route::post('/admin/crudInconsistencia', [InconsistenciaSuministroController::class, 'store'])->name('inconsistencia.store');
Route::get('/admin/crudInconsistencia/{id}/edit', [InconsistenciaSuministroController::class, 'edit'])->name('inconsistencia.edit');
Route::put('/admin/crudInconsistencia/{id}/update', [InconsistenciaSuministroController::class, 'update'])->name('inconsistencia.update');
Route::delete('/admin/crudInconsistencia/{id}', [InconsistenciaSuministroController::class, 'destroy'])->name('inconsistencia.destroy');


//Cliente

// Ruta para la página de inicio del cliente
Route::get('/client/homeClient', [HomeClientController::class, 'index'])->name('client.homeClient');

//Inicio sesion Cliente
Route::prefix('client')->group(function () {
    Route::get('/inicioSesion', [AuthClientController::class, 'showLoginForm'])->name('client.inicioSesion');
    Route::post('/inicioSesion', [AuthClientController::class, 'login'])->name('client.inicioSesion.submit'); // Aquí debería ser la ruta correcta para el inicio de sesión
    Route::get('/registrate', [AuthClientController::class, 'showRegistrationForm'])->name('client.registrate');
    Route::post('/registrate', [AuthClientController::class, 'register'])->name('client.registrate.submit');
});

// Reportar Problemas
Route::get('/client/reportProblem', function () {
    // Aquí retornas la vista que contiene el formulario para reportar problemas de barrio
    return view('homeClient');
})->name('client.reportProblem.create');

Route::post('/client/reportProblem', [ProblemaBarrioController::class, 'store'])->name('client.reportProblem.store');

