<?php 

    namespace App\DDD\Infraestructure\Repository;

    use App\DDD\Domain\Reservas\Entities\Salon;
    use App\DDD\Domain\Reservas\Ports\SalonRepository;
    use App\DDD\Infraestructure\Repository\Eloquent\SalonORM;

    class SalonRepositoryImpl implements SalonRepository
    {
        public function addSalon(Salon $salon): bool
        {
            $model = new SalonORM([
                'nombre_salon' =>$salon->nombre_salon,
                'capacidad_salon' =>$salon->capacidad_salon,
                'descripcion_salon' =>$salon->descripcion_salon

            ]);
            return $model->save();
        }

        public function updateSalon($id, Salon $salon): bool
        {
            $model = SalonORM::query()->findOrFail($id);

            return $model->update([
                'nombre_salon' =>$salon->nombre_salon,
                'capacidad_salon' =>$salon->capacidad_salon,
                'descripcion_salon' =>$salon->descripcion_salon
            ]);
        }

        public function getSalon($id): Salon|null
        {
            $model = SalonORM::query()->findOrFail(($id));
            return $this->makeSalonFrom($model);
        }

        public function deleteSalon($id): bool
        {
            $affected = SalonORM::destroy($id);
            return $affected>0;
        }

        public function getSalonAll(): array
        {
            $list = [];

            foreach(SalonORM::all() as $model)
            {
                $list[$model->id_salon] = $this->makeSalonFrom($model);
            }
            return $list;
        }

        protected function makeSalonFrom(SalonORM $salon) : Salon
        {
            return new Salon(
                $salon->id_salon,
                $salon->nombre_salon,
                $salon->capacidad_salon,
                $salon->descripcion_salon

            );
        }
    }

?>