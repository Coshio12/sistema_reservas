<?php 

    namespace App\DDD\Infraestructure\Repository;

    use App\DDD\Domain\Reservas\Entities\Paquetes;
    use App\DDD\Domain\Reservas\Ports\PaquetesRepository;
    use App\DDD\Infraestructure\Repository\Eloquent\PaquetesORM;
    use App\DDD\Infraestructure\Repository\Eloquent\ReservaTransporteORM;

    class PaquetesRepositoryImpl implements PaquetesRepository
    {
        public function addPaquete(Paquetes $paquetes): bool
        {
            $model = new PaquetesORM([
                'nombre_paquetes' => $paquetes->nombre_paquetes,
                'descripcion_paquetes' =>$paquetes->descripcion_paquetes
            ]); 
            return $model->save();
        }
        
        public function updatePaquete($id, Paquetes $paquetes): bool
        {
            $model = PaquetesORM::query()->findOrFail($id);

            return $model->update([
                'nombre_paquetes' =>$paquetes->nombre_paquetes,
                'descripcion_paquetes' =>$paquetes->descripcion_paquetes
            ]);
        }

        public function getPaquete($id): Paquetes|null
        {
            $model = PaquetesORM::query()->findOrFail($id);
            return $this->makePaqueteFrom($model);
        }

        public function deletePaquete($id): bool
        {
            $affected = PaquetesORM::destroy($id);
            return $affected >0;
        }

        public function getPaqueteAll(): array
        {
            $list = [];

            foreach (PaquetesORM::all() as $model)
            {
                $list[$model->id_paquetes] = $this->makePaqueteFrom($model);
            }
            return $list;
        }

        protected function makePaqueteFrom(PaquetesORM $paquetes): Paquetes
        {
            return new Paquetes(
                $paquetes->id_paquetes,
                $paquetes->nombre_paquetes,
                $paquetes->descripcion_paquetes
            );
        }

        public function getLastPaqueteId(): int
        {
            $ultimoId = PaquetesORM::latest('id_paquetes')->first('id_paquetes');
            if($ultimoId === null)
            {
                return 1;
            }
            return ($ultimoId->id_transporte + 1);
        }
    }

?>