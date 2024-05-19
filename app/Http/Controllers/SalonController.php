<?php

namespace App\Http\Controllers;

use App\DDD\Application\Salon\UseCases\AddSalonUseCase;
use App\DDD\Application\Salon\UseCases\CreateSalonUseCase;
use App\DDD\Application\Salon\UseCases\DeleteSalonUseCase;
use App\DDD\Application\Salon\UseCases\GetAllSalonUseCase;
use App\DDD\Application\Salon\UseCases\GetSalonUseCase;
use App\DDD\Application\Salon\UseCases\UpdateSalonUseCase;
use App\DDD\Infraestructure\Repository\SalonRepositoryImpl;
use App\Http\Requests\StoreSalonRequest;
use DomainException;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Exception\InvalidParameterException;

class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAllSalonUseCase = new GetAllSalonUseCase(new SalonRepositoryImpl());
        $salon = $getAllSalonUseCase->getSalonAll();

        return view('salon.index',[
            'salon'=>$salon
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('salon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalonRequest $request)
    {
        $validated = $request->validated();

        $salonRepository = new SalonRepositoryImpl();

        $casoUsoCrearSalon = new CreateSalonUseCase($salonRepository);

        $salon = $casoUsoCrearSalon->createSalon($validated);

        $casoUsoAgregarSalon = new AddSalonUseCase($salonRepository);

        if($casoUsoAgregarSalon->addSalon($salon))
        {
            return redirect()->route('salon.index')->with('sucess','Salon creado');
        }else{
            throw new DomainException('No se creo el salon');
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
        $salonRepository = new SalonRepositoryImpl();

        $casoUsoGetSalon = new GetSalonUseCase($salonRepository);

        $salon = $casoUsoGetSalon->getSalon($id);

        if(empty($salon))
        {
            throw new InvalidParameterException('El Salon no existe');
        }

        return view('salon.edit',[
            'salon'=>$salon
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSalonRequest $request, $id)
    {
        $salonRepository = new SalonRepositoryImpl();

        $casoUsoGetSalon = new GetSalonUseCase($salonRepository);

        $salon = $casoUsoGetSalon->getSalon($id);

        $salon->nombre_salon = $request->nombre_salon;
        $salon->capacidad_salon = $request->capacidad_salon;
        $salon->descripcion_salon = $request->descripcion_salon;

        $casoUsoUpdateSalon = new UpdateSalonUseCase($salonRepository);

        if($casoUsoUpdateSalon->updateSalon($id, $salon))
        {
            return redirect()->route('salon.index')->with('sucess','Salon modificado');
        }else{
            throw new DomainException('No se actualizo el registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $salonRepository = new SalonRepositoryImpl();

        $casoUsoDeleteSalon = new DeleteSalonUseCase($salonRepository);

        if($casoUsoDeleteSalon->deleteSalon($id))
        {
            return redirect()->route('salon.index')->with('sucess','El salon se borro');
        }else{
            throw new DomainException('No se elimino el salon');
        }
    }
}
