<?php

namespace App\Http\Controllers;

use App\DDD\Application\Armado\UseCases\GetAllArmadoUseCase;
use App\DDD\Application\Persona\UseCases\GetAllPersonaUseCase;
use App\DDD\Application\ReservaSalon\UseCases\AddReservaSalonUseCase;
use App\DDD\Application\ReservaSalon\UseCases\CreateReservaSalonUseCase;
use App\DDD\Application\ReservaSalon\UseCases\DeleteReservaSalonUseCase;
use App\DDD\Application\ReservaSalon\UseCases\GetReservaSalonUseCase;
use App\DDD\Domain\Reservas\Entities\ReservaSalon;
use App\DDD\Infraestructure\Repository\ReservaSalonRepositoryImpl;
use App\DDD\Infraestructure\Repository\Eloquent\ReservaSalonORM;
use Illuminate\Http\Request;

use App\DDD\Application\ReservaSalon\UseCases\GetAllReservaSalonUseCase;
use App\DDD\Application\ReservaSalon\UseCases\UpdateReservaSalonUseCase;
use App\DDD\Application\Salon\UseCases\GetAllSalonUseCase;
use App\DDD\Infraestructure\Repository\ArmadoRepositoryImpl;
use App\DDD\Infraestructure\Repository\PersonaRepositoryImpl;
use App\DDD\Infraestructure\Repository\SalonRepositoryImpl;
use App\Http\Requests\StoreReservaSalonRequest;
use DomainException;

class ReservaSalonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $reservaSalonRepository;
    public function __construct(ReservaSalonRepositoryImpl $reservaSalonRepository)
    {
        $this->reservaSalonRepository = $reservaSalonRepository;
    }
    public function index()
    {
        $reservas = $this->reservaSalonRepository->getReservasSalon(null);
        $getAllReservaSalonUseCase = new GetAllReservaSalonUseCase(new ReservaSalonRepositoryImpl());
        $reservas = $getAllReservaSalonUseCase->getReservaSalonAll();
        

        $reservas = ReservaSalonORM::with('personas')->get();
        $reservas = ReservaSalonORM::with('tipo_armado')->get();
        $reservas = ReservaSalonORM::with('salon')->get();
        

        $getAllPersonaUseCase = new GetAllPersonaUseCase(new PersonaRepositoryImpl());
        $personas = $getAllPersonaUseCase->getPersonaAll();

        $getAllArmadoUseCase = new GetAllArmadoUseCase(new ArmadoRepositoryImpl());
        $armado = $getAllArmadoUseCase->getArmadoAll();

        $getAllSalonUseCase = new GetAllSalonUseCase(new SalonRepositoryImpl());
        $salon = $getAllSalonUseCase->getSalonAll();

        return view('reservaSalon.index',[
            'reserva_salon'=>$reservas,
            'personas'=>$personas,
            'tipo_armado'=>$armado,
            'salon'=>$salon
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $getAllPersonaUseCase = new GetAllPersonaUseCase(new PersonaRepositoryImpl());
        $personas = $getAllPersonaUseCase->getPersonaAll();

        $getAllArmadoUseCase = new GetAllArmadoUseCase(new ArmadoRepositoryImpl());
        $armado = $getAllArmadoUseCase->getArmadoAll();

        $getAllSalonUseCase = new GetAllSalonUseCase(new SalonRepositoryImpl());
        $salon = $getAllSalonUseCase->getSalonAll();

        return view('reservaSalon.create',[
            'personas'=>$personas,
            'tipo_armado'=>$armado,
            'salon'=>$salon
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservaSalonRequest $request)
    {
        $validated = $request->validated();

        $reservaSalonRepository = new ReservaSalonRepositoryImpl();

        $casoUsoCrearReservaSalon = new CreateReservaSalonUseCase($reservaSalonRepository);

        $reservaSalon = $casoUsoCrearReservaSalon->createReservaSalon($validated);

        $casoUsoAgregarReservaSalon = new AddReservaSalonUseCase($reservaSalonRepository);

        if($casoUsoAgregarReservaSalon->addReservaSalon($reservaSalon))
        {
            return redirect()->route('reservaSalon.index')->with('sucess','Reserva creada');
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
        $reservaSalonRepository = new ReservaSalonRepositoryImpl();

        $casoUsoGetReservaSalon = new GetReservaSalonUseCase($reservaSalonRepository);

        $reservas = $casoUsoGetReservaSalon->getReservaSalon($id);

        $getAllPersonaUseCase = new GetAllPersonaUseCase(new PersonaRepositoryImpl());
        $personas = $getAllPersonaUseCase->getPersonaAll();

        $getAllArmadoUseCase = new GetAllArmadoUseCase(new ArmadoRepositoryImpl());
        $armado = $getAllArmadoUseCase->getArmadoAll();

        $getAllSalonUseCase = new GetAllSalonUseCase(new SalonRepositoryImpl());
        $salon = $getAllSalonUseCase->getSalonAll();

        return view('reservaSalon.edit',[
            'reserva_salon'=>$reservas,
            'personas'=>$personas,
            'tipo_armado'=>$armado,
            'salon'=>$salon
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreReservaSalonRequest $request, string $id)
    {
        $reservaSalonRepository = new ReservaSalonRepositoryImpl();

        $casoUsoGetReservaSalon = new GetReservaSalonUseCase($reservaSalonRepository);

        $reservaSalon = $casoUsoGetReservaSalon->getReservaSalon($id);

        $reservaSalon->nombre_evento = $request->nombre_evento;
        $reservaSalon->nombre_cliente = $request->nombre_cliente;
        $reservaSalon->celular_cliente = $request->celular_cliente;
        $reservaSalon->tipo_cliente = $request->tipo_cliente;
        $reservaSalon->fecha_reserva = $request->fecha_reserva;
        $reservaSalon->hora_inicio = $request->hora_inicio;
        $reservaSalon->hora_final = $request->hora_final;
        $reservaSalon->horas_totales = $request->horas_totales;
        $reservaSalon->tipo_periodo = $request->tipo_periodo;
        $reservaSalon->costo_salon = $request->costo_salon;
        $reservaSalon->estado_reserva = $request->estado_reserva;
        $reservaSalon->id_persona = $request->id_persona;
        $reservaSalon->id_salon = $request->id_salon;
        $reservaSalon->id_armado = $request->id_armado;

        $casoUsoUpdateReservaSalon = new UpdateReservaSalonUseCase($reservaSalonRepository);

        if($casoUsoUpdateReservaSalon->updateReservaSalon($id,$reservaSalon))
        {
            return redirect()->route('reservaSalon.index')->with('sucess','Reserva modificada exitosamente');
        }else{
            throw new DomainException('No se pudo actualizar');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $reservaSalonRepository = new ReservaSalonRepositoryImpl();

        $casoUsoDeleteReservaSaon = new DeleteReservaSalonUseCase($reservaSalonRepository);
        
        if($casoUsoDeleteReservaSaon->deleteReservaSalon($id))
        {
            return redirect()->route('reservaSalon.index')->with('sucess','Reserva eliminada');
        }else{
            throw new DomainException('No se pudo eliminar');
        }

    }
}
