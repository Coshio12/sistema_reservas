<?php

namespace App\Http\Controllers;

use App\DDD\Application\Persona\UseCases\GetAllPersonaUseCase;
use App\DDD\Application\Persona\UseCases\GetPersonaUseCase;
use App\DDD\Infraestructure\Repository\Eloquent\ReservaTransporteORM;
use Illuminate\Http\Request;
use Illuminate\Http\Request\date;
use InvalidArgumentException;
use DomainException;

use Symfony\Component\HttpKernel\HttpCache\StoreInterface;
use Symfony\Component\Routing\Exception\InvalidParameterException;

use App\DDD\Application\ReservaTransporte\UseCases\AddReservaTransporteUseCase;
use App\DDD\Application\ReservaTransporte\UseCases\CreateReservaTransporteUseCase;
use App\DDD\Application\ReservaTransporte\UseCases\deleteReservaTransporteUseCase;
use App\DDD\Infraestructure\Repository\ReservaTransporteRepositoryImpl;

use App\DDD\Application\ReservaTransporte\UseCases\GetAllReservaTransporteUseCase;
use App\DDD\Application\ReservaTransporte\UseCases\GetReservaTransporteUseCase;
use App\DDD\Application\ReservaTransporte\UseCases\UpdateReservaTransporteUseCase;
use App\DDD\Infraestructure\Repository\PersonaRepositoryImpl;
use App\DDD\Domain\Reservas\Entities;


use App\Http\Requests\StoreReservaTransporteRequest;


class Reserva_transporteController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */

    private $reservaTransporteRepository;
    public function __construct(ReservaTransporteRepositoryImpl $reservaTransporteRepository)
    {
        $this->reservaTransporteRepository = $reservaTransporteRepository;
    }
     
    public function index()
    {
        $reservas = $this->reservaTransporteRepository->getReservasTransporte(null); // Pass null to get all

        $getAllReservaUseCase = new GetAllReservaTransporteUseCase(new ReservaTransporteRepositoryImpl());

        $reservas = $getAllReservaUseCase->getReservaTransporteAll();
        $reservas = ReservaTransporteORM::with('personas')->get();

        $getAllPersonaUseCase = new GetAllPersonaUseCase(new PersonaRepositoryImpl());
        $personas = $getAllPersonaUseCase->getPersonaAll();

        return view('reservaTransporte.index',[
            'reserva_transporte' =>$reservas,
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
        // dd($personas);
        return view('reservaTransporte.create', [
            'personas'=>$personas
        ]);
    }


    /**
     * Store a newly created resource in storage.
     * StoreReservaTransporteRequest $request
     */
    public function store(StoreReservaTransporteRequest $request)
    {
        
        $validated = $request->validated();
        // dd($validated);

        $reservaTransporteRepository = new ReservaTransporteRepositoryImpl();

        $casoUsoCrearReservaTransporte = new CreateReservaTransporteUseCase($reservaTransporteRepository);

        $reservas = $casoUsoCrearReservaTransporte->createReservaTransporte($validated);

        $casoUsoAgregarReservaTransporte = new AddReservaTransporteUseCase($reservaTransporteRepository);

        if($casoUsoAgregarReservaTransporte->addReservaTransporte($reservas)){
            return redirect()->route('reservaTransporte.index')->with('success','Reserva Creada');
        }else{
            throw new DomainException('No se puedo crear la reserva');
        }
        // return view('dashboard');
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
        $reservaTransporteRepository = new ReservaTransporteRepositoryImpl();

        $casoUsoGetReservaTransporte = new GetReservaTransporteUseCase($reservaTransporteRepository);

        $reservas = $casoUsoGetReservaTransporte->getReservaTransporte($id);

        $GetAllPersonaUseCase = new GetAllPersonaUseCase(new PersonaRepositoryImpl());

        $personas = $GetAllPersonaUseCase->getPersonaAll();

        if(empty($reservas)){
            throw new InvalidParameterException('La reserva no existe');
        }

        return view('reservaTransporte.edit',[
            'reserva_transporte'=>$reservas,
            'personas'=>$personas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreReservaTransporteRequest $request, string $id)
    {
        
        $reservaTransporteRepository = new ReservaTransporteRepositoryImpl();

        $casoUsoGetReservaTransporte = new GetReservaTransporteUseCase($reservaTransporteRepository);

        $reservas = $casoUsoGetReservaTransporte->getReservaTransporte($id);

        $reservas->nombre_cliente = $request->nombre_cliente;
        $reservas->contacto_cliente = $request->contacto_cliente;
        $reservas->cantidad_personas = $request->cantidad_personas;
        $reservas->recoger_de = $request->recoger_de;
        $reservas->llevar_a = $request->llevar_a;
        $reservas->fecha_reserva = $request->fecha_reserva;
        $reservas->hora_reserva = $request->hora_reserva;
        $reservas->forma_pago = $request->forma_pago;
        $reservas->costo_carrera = $request->costo_carrera;
        $reservas->estado_carrera = $request->estado_carrera;
        $reservas->id_persona = $request->id_persona;

        $casoUsoUpdataReservaTransporte = new UpdateReservaTransporteUseCase($reservaTransporteRepository);

        if($casoUsoUpdataReservaTransporte->updateReservaTransporte($id,$reservas)){
            return redirect()->route('reservaTransporte.index')->with('success','Reserva modificada exitosamente');
        }else{
            throw new DomainException('No se puedo actualziar el registro');
        }


    }

    public function delete($id)
    {
        $reservaTransporteRepository = new ReservaTransporteRepositoryImpl();

        $casoUsoDeleteReservaTransporte = new DeleteReservaTransporteUseCase($reservaTransporteRepository);

        if($casoUsoDeleteReservaTransporte->deleteReservaTransporte($id)){

            return redirect()->route('reservaTransporte.index')->with('success','Reserva eliminada exitosamente');

        }else{

            throw new DomainException('No se pudo eliminar el personal');
            
        }
    }

    public function changeState(string $id, Request $request)
    {
        $reservaTransporteRepository = new ReservaTransporteRepositoryImpl();

        // Get the new state from the request
        $nuevoEstado = $request->get('estado');

        // Validate the new state (optional)
        // You can add validation logic here to ensure the state is valid (e.g., "completado", "pendiente", "cancelado")

        $casoUsoCambiarEstadoReservaTransporte = new UpdateReservaTransporteUseCase($reservaTransporteRepository);

        if ($casoUsoCambiarEstadoReservaTransporte->updateReservaTransporte($id, $nuevoEstado)) {
            return redirect()->route('reservaTransporte.index')->with('success', 'Estado de la reserva modificado exitosamente');
        } else {
            throw new DomainException('No se pudo modificar el estado de la reserva');
        }
    }
    
}
