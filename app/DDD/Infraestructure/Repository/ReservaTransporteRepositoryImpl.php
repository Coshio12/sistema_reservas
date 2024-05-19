<?php 

    namespace App\DDD\Infraestructure\Repository;

    use App\DDD\Domain\Reservas\Entities\ReservaTransporte;
    use App\DDD\Domain\Reservas\Ports\ReservaTransporteRepository;
    use App\DDD\Infraestructure\Repository\Eloquent\ReservaTransporteORM;

    class ReservaTransporteRepositoryImpl implements ReservaTransporteRepository
    {
        public function addReservaTransporte(ReservaTransporte $reservaTransporte): bool
        {
            $model = new ReservaTransporteORM([
                
                'nombre_cliente'=>$reservaTransporte->nombre_cliente,
                'contacto_cliente'=>$reservaTransporte->contacto_cliente,
                'cantidad_personas'=>$reservaTransporte->cantidad_personas,
                'recoger_de'=>$reservaTransporte->recoger_de,
                'llevar_a'=>$reservaTransporte->llevar_a,
                'fecha_reserva'=>$reservaTransporte->fecha_reserva,
                'hora_reserva'=>$reservaTransporte->hora_reserva,
                'forma_pago'=>$reservaTransporte->forma_pago,
                'costo_carrera'=>$reservaTransporte->costo_carrera,
                'estado_carrera'=>$reservaTransporte->estado_carrera,
                'id_persona'=>$reservaTransporte->id_persona
            ]);
            return $model->save();
        }

        public function updateReservaTransporte($id, ReservaTransporte $reservaTransporte): bool
        {
            $model = ReservaTransporteORM::query()->findOrFail($id);

            return $model->update([
                'nombre_cliente'=>$reservaTransporte->nombre_cliente,
                'contacto_cliente'=>$reservaTransporte->contacto_cliente,
                'cantidad_personas'=>$reservaTransporte->cantidad_personas,
                'recoger_de'=>$reservaTransporte->recoger_de,
                'llevar_a'=>$reservaTransporte->llevar_a,
                'fecha_reserva'=>$reservaTransporte->fecha_reserva,
                'hora_reserva'=>$reservaTransporte->hora_reserva,
                'forma_pago'=>$reservaTransporte->forma_pago,
                'costo_carrera'=>$reservaTransporte->costo_carrera,
                'estado_carrera'=>$reservaTransporte->estado_carrera,
                'id_persona'=>$reservaTransporte->id_persona
            ]);
        }

        public function getReservaTransporte($id): ReservaTransporte|null
        {
            $model = ReservaTransporteORM::query()->findOrFail($id);
            return $this->makeReservaTransporteFrom($model);
        }

        public function deleteReservaTransporte($id): bool
        {
            $affected = ReservaTransporteORM::destroy($id);

            return $affected >0;
        }

        public function getReservaTransporteAll(): array
        {
            $list =[];
            
            foreach (ReservaTransporteORM::all() as $model)
            {
                $list[$model->id_reserva_transporte] = $this->makeReservaTransporteFrom($model);
            }

            return $list;
        }

        protected function makeReservaTransporteFrom(ReservaTransporteORM $reservaTransporte): ReservaTransporte
        {
            return new ReservaTransporte(
                $reservaTransporte->id_reserva_transporte,
                $reservaTransporte->nombre_cliente,
                $reservaTransporte->contacto_cliente,
                $reservaTransporte->cantidad_personas,
                $reservaTransporte->recoger_de,
                $reservaTransporte->llevar_a,
                $reservaTransporte->fecha_reserva,
                $reservaTransporte->hora_reserva,
                $reservaTransporte->forma_pago,
                $reservaTransporte->costo_carrera,
                $reservaTransporte->estado_carrera,
                $reservaTransporte->id_persona
            );
        }

        public function getLastReservaTransporteId(): int
        {
            $ultimoId = ReservaTransporteORM::latest('id_reserva_transporte')->first('id_reserva_transporte');
            if($ultimoId === null)
            {
                return 1;
            }
            return ($ultimoId->id_reserva_transporte + 1);

        }

        public function updateEstadoReservaTransporte($id, string $nuevoEstado): bool
        {
            $model = ReservaTransporteORM::query()->findOrFail($id);

            if (!$model) {
                return false; // Reservation not found
            }

            $model->estado_carrera = $nuevoEstado;
            return $model->save();
        }

        public function getReservasTransporte($id): array
        {
            $list = [];

            $registros = ReservaTransporteORM::join('personas','reserva_transporte.id_persona', '=', 'personas.id_persona')
            ->select(
                'reserva_transporte.id_reserva_transporte',
                'reserva_transporte.nombre_cliente',
                'reserva_transporte.contacto_cliente',
                'reserva_transporte.cantidad_personas',
                'reserva_transporte.recoger_de',
                'reserva_transporte.llevar_a',
                'reserva_transporte.fecha_reserva',
                'reserva_transporte.hora_reserva',
                'reserva_transporte.forma_pago',
                'reserva_transporte.costo_carrera',
                'reserva_transporte.estado_carrera',
                'personas.nombre_persona as nombre_persona'
            )->get();
            

            foreach($registros as $model){
                $list[$model->id_reserva_transporte] = $this->makeReservaTransporteFrom($model);
            }

            return $list;
        }

        
        
    }

?>