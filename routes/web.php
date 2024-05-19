<?php

use App\Http\Controllers\PaquetesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Reserva_transporteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\Reserva_turismoController;
use App\Http\Controllers\ArmadoController;
use App\Http\Controllers\Notificaciones_transporteController;
use App\Http\Controllers\ReservaSalonController;
use App\Http\Controllers\SalonController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::get('/sendsms', [Notificaciones_transporteController::class, 'sendsms']);

    //seccion perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Rutas persona   
    Route::get('/persona/index/', [PersonaController::class, 'index'])->name('persona.index');
    Route::post('/persona/update/{id}', [PersonaController::class, 'update'])->name('persona.update');
    Route::get('/persona/create', [PersonaController::class, 'create'])->name('persona.create');
    Route::post('/persona/store', [PersonaController::class, 'store'])->name('persona.store');
    Route::get('/persona/edit/{id}', [PersonaController::class, 'edit'])->name('persona.edit');
    Route::post('/persona/delete/{id}', [PersonaController::class, 'delete'])->name('persona.delete');
    

    //Rutas ReservaTransporte
    Route::get('/reservaTransporte/index/', [Reserva_transporteController::class, 'index'])->name('reservaTransporte.index');
    Route::post('/reservaTransporte/update/{id}', [Reserva_transporteController::class, 'update'])->name('reservaTransporte.update');
    Route::get('/reservaTransporte/create', [Reserva_transporteController::class, 'create'])->name('reservaTransporte.create');
    Route::post('/reservaTransporte/store', [Reserva_transporteController::class, 'store'])->name('reservaTransporte.store');
    Route::get('/reservaTransporte/edit/{id}', [Reserva_transporteController::class, 'edit'])->name('reservaTransporte.edit');
    Route::post('/reservaTransporte/delete/{id}', [Reserva_transporteController::class, 'delete'])->name('reservaTransporte.delete');

    Route::put('/reserva-transporte/change-state/{id}', [Reserva_transporteController::class, 'changeState'])->name('reservaTransporte.changeState');

    //Rutas Paquetes
    Route::get('/paquetes/index/', [PaquetesController::class, 'index'])->name('paquetes.index');
    Route::post('/paquetes/update/{id}', [PaquetesController::class, 'update'])->name('paquetes.update');
    Route::get('/paquetes/create', [PaquetesController::class, 'create'])->name('paquetes.create');
    Route::post('/paquetes/store', [PaquetesController::class, 'store'])->name('paquetes.store');
    Route::get('/paquetes/edit/{id}', [PaquetesController::class, 'edit'])->name('paquetes.edit');
    Route::post('/paquetes/delete/{id}', [PaquetesController::class, 'delete'])->name('paquetes.delete');

    //Rutas Turismo
    Route::get('/reservaTurismo/index/', [Reserva_turismoController::class, 'index'])->name('reservaTurismo.index');
    Route::post('/reservaTurismo/update/{id}', [Reserva_turismoController::class, 'update'])->name('reservaTurismo.update');
    Route::get('/reservaTurismo/create', [Reserva_turismoController::class, 'create'])->name('reservaTurismo.create');
    Route::post('/reservaTurismo/store', [Reserva_turismoController::class, 'store'])->name('reservaTurismo.store');
    Route::get('/reservaTurismo/edit/{id}', [Reserva_turismoController::class, 'edit'])->name('reservaTurismo.edit');
    Route::post('/reservaTurismo/delete/{id}', [Reserva_turismoController::class, 'delete'])->name('reservaTurismo.delete');

    //Rutas Armado
    Route::get('/armado/index/', [ArmadoController::class, 'index'])->name('armado.index');
    Route::post('/armado/update/{id}', [ArmadoController::class, 'update'])->name('armado.update');
    Route::get('/armado/create', [ArmadoController::class, 'create'])->name('armado.create');
    Route::post('/armado/store', [ArmadoController::class, 'store'])->name('armado.store');
    Route::get('/armado/edit/{id}', [ArmadoController::class, 'edit'])->name('armado.edit');
    Route::post('/armado/delete/{id}', [ArmadoController::class, 'delete'])->name('armado.delete');

    //Rutas Salon
    Route::get('/salon/index/', [SalonController::class, 'index'])->name('salon.index');
    Route::post('/salon/update/{id}', [SalonController::class, 'update'])->name('salon.update');
    Route::get('/salon/create', [SalonController::class, 'create'])->name('salon.create');
    Route::post('/salon/store', [SalonController::class, 'store'])->name('salon.store');
    Route::get('/salon/edit/{id}', [SalonController::class, 'edit'])->name('salon.edit');
    Route::post('/salon/delete/{id}', [SalonController::class, 'delete'])->name('salon.delete');

    //Rutas Reserva Salon
    Route::get('/reservaSalon/index/', [ReservaSalonController::class, 'index'])->name('reservaSalon.index');
    Route::post('/reservaSalon/update/{id}', [ReservaSalonController::class, 'update'])->name('reservaSalon.update');
    Route::get('/reservaSalon/create', [ReservaSalonController::class, 'create'])->name('reservaSalon.create');
    Route::post('/reservaSalon/store', [ReservaSalonController::class, 'store'])->name('reservaSalon.store');
    Route::get('/reservaSalon/edit/{id}', [ReservaSalonController::class, 'edit'])->name('reservaSalon.edit');
    Route::post('/reservaSalon/delete/{id}', [ReservaSalonController::class, 'delete'])->name('reservaSalon.delete');

});


require __DIR__.'/auth.php';
