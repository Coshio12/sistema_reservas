<?php

namespace App\Http\Controllers;

use App\DDD\Application\Armado\UseCases\AddArmadoUseCase;
use App\DDD\Application\Armado\UseCases\CreateArmadoUseCase;
use App\DDD\Application\Armado\UseCases\DeleteArmadoUseCase;
use App\DDD\Application\Armado\UseCases\GetAllArmadoUseCase;
use App\DDD\Application\Armado\UseCases\GetArmadoUseCase;
use App\DDD\Application\Armado\UseCases\UpdateArmadoUseCase;
use App\DDD\Infraestructure\Repository\ArmadoRepositoryImpl;
use App\Http\Requests\StoreArmadoRequest;
use DomainException;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Exception\InvalidParameterException;

class ArmadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAllArmadoUseCase = new GetAllArmadoUseCase(new ArmadoRepositoryImpl());
        $armado = $getAllArmadoUseCase->getArmadoAll();

        return view('armado.index',[
            'tipo_armado'=>$armado
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('armado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArmadoRequest $request)
    {
        $validated = $request->validated();

        $armadoRepository = new ArmadoRepositoryImpl();

        $casoUsoCrearArmado = new CreateArmadoUseCase($armadoRepository);

        $armado = $casoUsoCrearArmado->createArmado($validated);

        $casoUsoAgregarArmado = new AddArmadoUseCase($armadoRepository);

        if($casoUsoAgregarArmado->addArmado($armado))
        {
            return redirect()->route('armado.index')->with('sucess','Armado registrasdo');
        }else{
            throw new DomainException('No se creo el Armado');
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
        $armadoRepository = new ArmadoRepositoryImpl();

        $casoUsoGetArmado = new GetArmadoUseCase($armadoRepository);

        $armado = $casoUsoGetArmado->getArmado($id);
        //dd($armado);

        if(empty($armado))
        {
            throw new InvalidParameterException('El Armado no existe');
        }

        return view('armado.edit',[
            'tipo_armado'=>$armado
        ]);
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreArmadoRequest $request, string $id)
    {
        $armadoRepository = new ArmadoRepositoryImpl();

        $casoUsoGetArmado = new GetArmadoUseCase($armadoRepository);

        $armado = $casoUsoGetArmado->getArmado(($id));

        $armado->nombre_armado = $request->nombre_armado;

        $casoUsoUpdateArmado =new UpdateArmadoUseCase($armadoRepository);

        if($casoUsoUpdateArmado->updateArmado($id,$armado))
        {
            return redirect()->route('armado.index')->with('sucess','Armado modificado');
        }else{
            throw new DomainException('No se modifico el registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $armadoRepository = new ArmadoRepositoryImpl();

        $casoUsoDeleteArmado = new DeleteArmadoUseCase($armadoRepository);

        if($casoUsoDeleteArmado->deleteArmado($id))
        {
            return redirect()->route('armado.index')->with('sucess','Registro armado borrado');
        }else{
            throw new DomainException('No se elimino el registro');
        }
    }
}
