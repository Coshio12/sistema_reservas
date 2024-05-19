<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DomainException;
use InvalidArgumentException;

use App\DDD\Application\Persona\UseCases;
use App\DDD\Application\Persona\UseCases\AddPersonaUseCase;
use App\DDD\Application\Persona\UseCases\CreatePersonaUseCase;
use App\DDD\Application\Persona\UseCases\DeletePersonaUseCase;
use App\DDD\Application\Persona\UseCases\GetAllPersonaUseCase;
use App\DDD\Application\Persona\UseCases\GetPersonaUseCase;
use App\DDD\Application\Persona\UseCases\UpdatePersonaUsecase;
use App\DDD\Domain\Reservas\Entities\Persona;
use App\DDD\Infraestructure\Repository\PersonaRepositoryImpl;
use App\Http\Requests\StorePersonaRequest;
use Symfony\Component\HttpKernel\HttpCache\StoreInterface;
use Symfony\Component\Routing\Exception\InvalidParameterException;

class PersonaController extends Controller
{   
    public function index()
    {
        $getAllPersonaUseCase = new GetAllPersonaUseCase(new PersonaRepositoryImpl());
        $personas = $getAllPersonaUseCase->getPersonaAll();
        
        return view('persona.index',[
            'personas' =>$personas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('persona.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonaRequest $request)
    {
        
        $validated = $request->validated();
        
        

        $personaRepository  = new PersonaRepositoryImpl();

        $casoUsoCrearPersona = new CreatePersonaUseCase($personaRepository);
        

        $persona = $casoUsoCrearPersona->createPersona($validated);
         
        $casoUsoAgregarPersona = new AddPersonaUseCase($personaRepository);
        
        
        if($casoUsoAgregarPersona->addPersona($persona)){
            return redirect()->route('persona.index')->with('success','Personal creado exitosamente');
            
        }else{
            throw new DomainException('No se puedo crear el personal');
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
        $PersonaRepository = new PersonaRepositoryImpl();

        $casoUsoGetPersona = new GetPersonaUseCase($PersonaRepository);

        $persona =$casoUsoGetPersona->getPersona($id);

        if(empty($persona)){
            throw new InvalidParameterException('El personal no existe');
        }

        return view('persona.edit', ['persona'=>$persona]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePersonaRequest $request, string $id)
    {
        $personaRepository = new PersonaRepositoryImpl();

        $casoUsoGetPersona = new GetPersonaUseCase($personaRepository);

        $persona = $casoUsoGetPersona->getPersona($id);

        $persona->nombre_persona = $request->nombre_persona;
        $persona->apellido_persona = $request->apellido_persona;
        $persona->celular_persona = $request->celular_persona;
        $persona->correo_persona = $request->correo_persona;

        $casoUsoUpdatePersona = new UpdatePersonaUsecase($personaRepository);

        if($casoUsoUpdatePersona->updatePersona($id, $persona)){
            return redirect()->route('persona.index')->with('success','Persona modificado exitosamente');
        }else{
            throw new DomainException('No se puedo actualziar el registro');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $personaRepository = new PersonaRepositoryImpl();

        $casoUsoDeletePersona = new DeletePersonaUseCase($personaRepository);

        if($casoUsoDeletePersona->deletePersona($id)){

            return redirect()->route('persona.index')->with('success','El personal se elimino perfectamente');

        }else{

            throw new DomainException('No se pudo eliminar el personal');
        }
    }
}
