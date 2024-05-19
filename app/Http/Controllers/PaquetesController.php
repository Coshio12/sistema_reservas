<?php

namespace App\Http\Controllers;

use App\DDD\Application\Paquetes_Turismo\UseCases\addPaqueteUseCase;
use App\DDD\Application\Paquetes_Turismo\UseCases\CreatePaqueteUseCase;
use App\DDD\Application\Paquetes_Turismo\UseCases\DeletePaqueteUseCase;
use App\DDD\Application\Paquetes_Turismo\UseCases\GetAllPaqueteUseCase;
use App\DDD\Application\Paquetes_Turismo\UseCases\GetPaqueteUseCase;
use App\DDD\Application\Paquetes_Turismo\UseCases\UpdatePaqueteUseCase;
use App\DDD\Infraestructure\Repository\PaquetesRepositoryImpl;
use App\DDD\Domain\Reservas\Entities\Paquetes;
use App\Http\Requests\StorePaquetesRequest;
use DomainException;
use Egulias\EmailValidator\Parser\DomainPart;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Exception\InvalidParameterException;

class PaquetesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAllPaqueteUseCase = new GetAllPaqueteUseCase(new PaquetesRepositoryImpl());
        $paquetes = $getAllPaqueteUseCase->getPaqueteAll();

        return view('paquetes.index',[
            'paquetes_turismo'=>$paquetes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paquetes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaquetesRequest $request)
    {
        $validated = $request->validated();

        $paqueteRepository = new PaquetesRepositoryImpl();

        $casoUsoCrearPaquetes = new CreatePaqueteUseCase($paqueteRepository);

        $paquetes = $casoUsoCrearPaquetes->createPaquete($validated);

        $casoUsoAgregarPaquetes = new addPaqueteUseCase($paqueteRepository);

        if($casoUsoAgregarPaquetes->addPaquete($paquetes)){
            return redirect()->route('paquetes.index')->with('success','Paquete creado con exito');
        }else{
            throw new DomainException('No se creo el paquete');
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
        $paqueteRepository = new PaquetesRepositoryImpl();

        $casoUsoGetPaquete = new GetPaqueteUseCase($paqueteRepository);

        $paquetes = $casoUsoGetPaquete->getPaquete($id);
        

        if(empty($paquetes)){
            throw new InvalidParameterException('El paquete no existe');
        }
        return view('paquetes.edit', ['paquetes_turismo'=>$paquetes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePaquetesRequest $request, string $id)
    {
        $paqueteRepository = new PaquetesRepositoryImpl();

        $casoUsoGetPaquete = new GetPaqueteUseCase($paqueteRepository);

        $paquetes = $casoUsoGetPaquete->getPaquete($id);

        $paquetes->nombre_paquetes = $request->nombre_paquetes;
        $paquetes->descripcion_paquetes = $request->descripcion_paquetes;

        $casoUsoUpdatePaquete = new UpdatePaqueteUseCase($paqueteRepository);

        if($casoUsoUpdatePaquete->updatePaquete($id, $paquetes)){
            return redirect()->route('paquetes.index')->with('Success','Paquete modificado exitosamente');
        }else{
            throw new DomainException('No se pudo actualizar el registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $paqueteRepository = new PaquetesRepositoryImpl();

        $casoUsoDeletePaquete = new DeletePaqueteUseCase($paqueteRepository);

        if($casoUsoDeletePaquete->deletePaquete($id)){
            return redirect()->route('paquetes.index')->with('success','El paquete se borro correctamente');
        }else{
            throw new DomainException('No se pudo eliminar el paquete');
        }
    }
}
