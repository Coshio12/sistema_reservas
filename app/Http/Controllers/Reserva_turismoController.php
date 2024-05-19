<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\date;
use InvalidArgumentException;
use DomainException;

use Symfony\Component\HttpKernel\HttpCache\StoreInterface;
use Symfony\Component\Routing\Exception\InvalidParameterException;
use App\DDD\Infraestructure\Repository\Eloquent\ReservaTurismoORM;

use App\DDD\Application\Paquetes_Turismo\UseCases;
use App\DDD\Application\Paquetes_Turismo\UseCases\GetAllPaqueteUseCase;

use App\DDD\Application\Persona\UseCases\GetAllPersonaUseCase;
use App\DDD\Application\Persona\UseCases\GetPersonaUseCase;
use App\DDD\Application\ReservaTurismo\UseCases\AddReservaTurismoUseCase;
use App\DDD\Application\ReservaTurismo\UseCases\CreateReservaTurismoUseCase;
use App\DDD\Application\ReservaTurismo\UseCases\DeleteReservaTurismoUseCase;
use App\DDD\Application\ReservaTurismo\UseCases\GetAllReservaTurismoUseCase;
use App\DDD\Application\ReservaTurismo\UseCases\GetReservaTurismoUseCase;
use App\DDD\Application\ReservaTurismo\UseCases\UpdateReservaTurismoUseCase;
use App\DDD\Infraestructure\Repository\PaquetesRepositoryImpl;
use App\DDD\Infraestructure\Repository\PersonaRepositoryImpl;
use App\DDD\Infraestructure\Repository\ReservaTurismoRepositoryImpl;
use App\Http\Requests\StoreReservaTurismoRequest;

class Reserva_turismoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    private $reservaTurismoRepository;
    public function __construct(ReservaTurismoRepositoryImpl $reservaTurismoRepository)
    {
        $this->reservaTurismoRepository = $reservaTurismoRepository;
    }
    public function index()
    {
        $reservas = $this->reservaTurismoRepository->getReservasTurismo(null);
        $getAllReservaUseCase = new GetAllReservaTurismoUseCase(new ReservaTurismoRepositoryImpl());
        $reservas = $getAllReservaUseCase->getReservaTurismoAll();
        $reservas = ReservaTurismoORM::with('personas')->get();
        $reservas = ReservaTurismoORM::with('paquetes_turismo')->get();

        $getAllPersonaUseCase = new GetAllPersonaUseCase(new PersonaRepositoryImpl());
        $personas = $getAllPersonaUseCase->getPersonaAll();

        $getAllPaquetesUseCase = new GetAllPaqueteUseCase(new PaquetesRepositoryImpl());
        $paquetes = $getAllPaquetesUseCase->getPaqueteAll();
        

        return view('reservaTurismo.index',[
            'reserva_turismo'=>$reservas,
            'paquetes_turismo'=>$paquetes,
            'personas'=>$personas
            
            
        ]);

        

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $getAllPersonaUseCase = new GetAllPersonaUseCase(new PersonaRepositoryImpl());
        $personas = $getAllPersonaUseCase->getPersonaAll();

        $getAllPaquetesUseCase = new GetAllPaqueteUseCase(new PaquetesRepositoryImpl());
        $paquetes = $getAllPaquetesUseCase->getPaqueteAll();

        return view('reservaTurismo.create',[
            'personas'=>$personas,
            'paquetes_turismo'=>$paquetes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservaTurismoRequest $request)
    {
        $validated = $request->validated();
        

        $reservaTurismoRepository = new ReservaTurismoRepositoryImpl();

        $casoUsoCrearReservaTurismo = new CreateReservaTurismoUseCase($reservaTurismoRepository);

        $reservaTurismo = $casoUsoCrearReservaTurismo->createReservaTurismo($validated);

        $casoUsoAgregarReservaTurismo = new AddReservaTurismoUseCase($reservaTurismoRepository);

        if($casoUsoAgregarReservaTurismo->addReservaTurismo($reservaTurismo))
        {
            return redirect()->route('reservaTurismo.index')->with('sucess','Reserva creada exitosamente');
        }else{
            throw new DomainException('No se creo la reserva');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reservaTurismoRepository = new ReservaTurismoRepositoryImpl();

        $casoUsoGetReservaTurismo = new GetReservaTurismoUseCase($reservaTurismoRepository);

        $reservas = $casoUsoGetReservaTurismo->getReservaTurismo($id);
        //dd($reservas);

        $getAllPersonaUseCase = new GetAllPersonaUseCase(new PersonaRepositoryImpl());
        $personas = $getAllPersonaUseCase->getPersonaAll();
        //dd($personas);

        $getAllPaquetesUseCase = new GetAllPaqueteUseCase(new PaquetesRepositoryImpl());
        $paquetes = $getAllPaquetesUseCase->getPaqueteAll();
        // dd($paquetes);

        if(empty($reservas))
        {
            throw new InvalidParameterException('La reserva no existe');
        }

        return view('reservaTurismo.edit',[
            'reserva_turismo'=>$reservas,
            'personas'=>$personas,
            'paquetes_turismo'=>$paquetes
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreReservaTurismoRequest $request, string $id)
    {
        $reservaTurismoRepository = new ReservaTurismoRepositoryImpl();

        $casoUsoGetReservaTurismo = new GetReservaTurismoUseCase($reservaTurismoRepository);

        $reservaTurismo = $casoUsoGetReservaTurismo->getReservaTurismo($id);

        $reservaTurismo->nombre_cliente = $request->nombre_cliente;
        $reservaTurismo->contacto_cliente = $request->contacto_cliente;
        $reservaTurismo->fecha_reserva = $request->fecha_reserva;
        $reservaTurismo->hora_inicio = $request->hora_inicio;
        $reservaTurismo->hora_final = $request->hora_final;
        $reservaTurismo->guia_encargado = $request->guia_encargado;
        $reservaTurismo->cantidad_personas = $request->cantidad_personas;
        $reservaTurismo->costo_turismo = $request->costo_turismo;
        $reservaTurismo->estado_carrera = $request->estado_carrera;
        $reservaTurismo->id_paquetes = $request->id_paquetes;
        $reservaTurismo->id_persona = $request->id_persona;
        
        $casoUsoUpdateReservaTurismo = new UpdateReservaTurismoUseCase($reservaTurismoRepository);

        if($casoUsoUpdateReservaTurismo->updateReservaTurismo($id,$reservaTurismo))
        {
            return redirect()->route('reservaTurismo.index')->with('sucess','Reserva modificada exitosamente');
        }else{
            throw new DomainException('No se pudo actualizar');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $reservaTurismoRepository = new ReservaTurismoRepositoryImpl();

        $casoUsoDeleteReservaTurismo = new DeleteReservaTurismoUseCase($reservaTurismoRepository);

        if($casoUsoDeleteReservaTurismo->deleteReservaTurismo($id))
        {
            return redirect()->route('reservaTurismo.index')->with('sucess','Reserva eliminada');
        }else{
            throw new DomainException('No se pudo eliminar');
        }
    }
}
