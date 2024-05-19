<?php 

    namespace App\DDD\Infraestructure\Repository;

    use App\DDD\Domain\Reservas\Entities\ReservaSalon;
    use App\DDD\Domain\Reservas\Ports\ReservaSalonRepository;
    use App\DDD\Infraestructure\Repository\Eloquent\ReservaSalonORM;

    class ReservaSalonRepositoryImpl implements ReservaSalonRepository
    {
        public function addReservaSalon(ReservaSalon $reservaSalon): bool
        {
            $model = new ReservaSalonORM([
                'nombre_evento'=>$reservaSalon->nombre_evento,
                'nombre_cliente'=>$reservaSalon->nombre_cliente,
                'celular_cliente'=>$reservaSalon->celular_cliente,
                'tipo_cliente'=>$reservaSalon->tipo_cliente,
                'fecha_reserva'=>$reservaSalon->fecha_reserva,
                'hora_inicio'=>$reservaSalon->hora_inicio,
                'hora_final'=>$reservaSalon->hora_final,
                'horas_totales'=>$reservaSalon->horas_totales,
                'tipo_periodo'=>$reservaSalon->tipo_periodo,
                'costo_salon'=>$reservaSalon->costo_salon,
                'estado_reserva'=>$reservaSalon->estado_reserva,
                'id_persona'=>$reservaSalon->id_persona,
                'id_salon'=>$reservaSalon->id_salon,
                'id_armado'=>$reservaSalon->id_armado
            ]);
            return $model->save();
        }

        public function updateReservaSalon($id, ReservaSalon $reservaSalon): bool
        {
            $model = ReservaSalonORM::query()->findOrFail(($id));

            return $model->update([
                'nombre_evento'=>$reservaSalon->nombre_evento,
                'nombre_cliente'=>$reservaSalon->nombre_cliente,
                'celular_cliente'=>$reservaSalon->celular_cliente,
                'tipo_cliente'=>$reservaSalon->tipo_cliente,
                'fecha_reserva'=>$reservaSalon->fecha_reserva,
                'hora_inicio'=>$reservaSalon->hora_inicio,
                'hora_final'=>$reservaSalon->hora_final,
                'horas_totales'=>$reservaSalon->horas_totales,
                'tipo_periodo'=>$reservaSalon->tipo_periodo,
                'costo_salon'=>$reservaSalon->costo_salon,
                'estado_reserva'=>$reservaSalon->estado_reserva,
                'id_persona'=>$reservaSalon->id_persona,
                'id_salon'=>$reservaSalon->id_salon,
                'id_armado'=>$reservaSalon->id_armado
            ]);
        }

        public function getReservaSalon($id): ReservaSalon|null
        {
            $model = ReservaSalonORM::query()->findOrFail($id);
            return $this->makeReservaSalonFrom($model);
        }

        public function deleteReservaSalon($id): bool
        {
            $affected = ReservaSalonORM::destroy($id);
            return $affected > 0;
        }

        public function getReservasSalon($id): array
        {
            $list = [];

            $registro = ReservaSalonORM::join('personas','reserva_salon.id_persona','=','personas.id_persona')
            ->join('tipo_armado','reserva_salon.id_armado','=','tipo_armado.id_armado')
            ->join('salon','reserva_salon.id_salon','=','salon.id_salon')
            ->select(
                'reserva_salon.id_reserva_salon',
                'reserva_salon.nombre_cliente',
                'reserva_salon.celular_cliente',
                'reserva_salon.tipo_cliente',
                'reserva_salon.fecha_reserva',
                'reserva_salon.hora_inicio',
                'reserva_salon.hora_final',
                'reserva_salon.horas_totales',
                'reserva_salon.tipo_periodo',
                'reserva_salon.costo_salon',
                'reserva_salon.estado_reserva',
                'personas.nombre_persona as nombre_persona',
                'salon.nombre_salon as nombre_salon',
                'tipo_armado.nombre_armado as nombre_armado',
            )->get();

            foreach($registro as $model)
            {
                $list[$model->id_reserva_salon] = $this->makeReservaSalonFrom($model);
            }

            return $list;

        }

        public function getReservaSalonAll(): array
        {
            $list = [];

            foreach (ReservaSalonORM::all() as $model)
            {
                $list[$model->id_reserva_salon] = $this->makeReservaSalonFrom($model);
            }
            return $list;
        }

        public function makeReservaSalonFrom(ReservaSalonORM $reservaSalon) : ReservaSalon
        {
            
            return new ReservaSalon(
                $reservaSalon->id_reserva_salon,
                $reservaSalon->nombre_evento,
                $reservaSalon->nombre_cliente,
                $reservaSalon->celular_cliente,
                $reservaSalon->tipo_cliente,
                $reservaSalon->fecha_reserva,
                $reservaSalon->hora_inicio,
                $reservaSalon->hora_final,
                $reservaSalon->horas_totales,
                $reservaSalon->tipo_periodo,
                $reservaSalon->costo_salon,
                $reservaSalon->estado_reserva,
                $reservaSalon->id_persona,
                $reservaSalon->id_salon,
                $reservaSalon->id_armado
            );
        }

        public function getLastReservaSalonId(): int
        {
            $ultimoId = ReservaSalonORM::latest('id_reserva_salon')->first('id_reserva_salon');

            if($ultimoId === null)
            {
                return 1;
            }
            return ($ultimoId->id_reserva_salon + 1);
        }
    }

?>