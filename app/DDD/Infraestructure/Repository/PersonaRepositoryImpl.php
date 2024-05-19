<?php 
    namespace App\DDD\Infraestructure\Repository;

    use App\DDD\Domain\Reservas\Entities\Persona;
    use App\DDD\Domain\Reservas\Ports\PersonaRepository;
    use App\DDD\Infraestructure\Repository\Eloquent\PersonaORM;

    class PersonaRepositoryImpl implements PersonaRepository
    {
        public function addPersona(Persona $persona): bool
        {
            $model = new PersonaORM([                
                'nombre_persona' => $persona->nombre_persona,
                'apellido_persona' => $persona->apellido_persona,
                'celular_persona' => $persona->celular_persona,
                'correo_persona' => $persona->correo_persona
            ]);
            return $model->save();
        }

        public function updatePersona($id, Persona $persona): bool
        {
            $model = PersonaORM::query()->findOrFail($id);

            return  $model->update([
                'nombre_persona' => $persona->nombre_persona,
                'apellido_persona' => $persona->apellido_persona,
                'celular_persona' => $persona->celular_persona,
                'correo_persona' => $persona->correo_persona
            ]);
        }

        public function getPersona($id): Persona|null
        {
            $model = PersonaORM::query()->findOrFail($id);
            return $this->makePersonaFrom($model);
        }

        public function deletePersona($id): bool
        {
            $affected = PersonaORM::destroy($id);
            return $affected >0;
        }

        public function getPersonaAll(): array
        {
            $list = [];

            foreach (PersonaORM::all() as $model)
            {
                $list[$model->id_persona] = $this->makePersonaFrom($model);

            }
            return $list;
        }

        protected function makePersonaFrom(PersonaORM $persona) : Persona {
            return new Persona(
                $persona->id_persona,
                $persona->nombre_persona,
                $persona->apellido_persona,
                $persona->celular_persona,
                $persona->correo_persona

            );
        }
        public function getLastPersonaId(): int
        {
            $ultimoId = PersonaORM::latest('id_persona')->first('id_persona');
            if($ultimoId === null)
            {
                return 1;
            }
            return ($ultimoId->id_persona + 1);
        }
    }
?>