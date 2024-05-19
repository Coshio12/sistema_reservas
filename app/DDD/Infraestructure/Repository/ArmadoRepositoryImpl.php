<?php 

    namespace App\DDD\Infraestructure\Repository;

    use App\DDD\Domain\Reservas\Entities\Armado;
    use App\DDD\Domain\Reservas\Ports\ArmadoRepository;
    use App\DDD\Infraestructure\Repository\Eloquent\ArmadoORM;

    class ArmadoRepositoryImpl implements ArmadoRepository
    {
        public function addArmado(Armado $armado): bool
        {
            $model = new ArmadoORM([
                'nombre_armado' =>$armado->nombre_armado
            ]);
            return $model->save();
        }

        public function updateArmado($id, Armado $armado): bool
        {
            $model = ArmadoORM::query()->findOrFail($id);

            return $model->update([
                'nombre_armado' =>$armado->nombre_armado
            ]);

        }

        public function getArmado($id): Armado|null
        {
            $model = ArmadoORM::query()->findOrFail($id);
            return $this->makeArmadoFrom($model);
        }

        public function deleteArmado($id): bool
        {
            $affected = ArmadoORM::destroy($id);
            return $affected>0;
        }

        public function getArmadoAll(): array
        {
            $list = [];

            foreach (ArmadoORM::all() as $model)
            {
                $list[$model->id_armado] = $this->makeArmadoFrom($model);
            }
            return $list;
        }

        public function makeArmadoFrom(ArmadoORM $armado) : Armado
        {
            return new Armado(
                $armado->id_armado,
                $armado->nombre_armado
            );
        }
        
    }

?>