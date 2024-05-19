<?php 

    namespace App\DDD\Infraestructure\Repository;

    use App\DDD\Domain\Reservas\Entities\ReservaTurismo;
    use App\DDD\Domain\Reservas\Ports\ReservaTurismoRepository;
    use App\DDD\Infraestructure\Repository\Eloquent\ReservaTurismoORM;

    class ReservaTurismoRepositoryImpl implements ReservaTurismoRepository
    {
        public function addReservaTurismo(ReservaTurismo $reservaTurismo): bool
        {
            $model = new ReservaTurismoORM([
                'nombre_cliente'=>$reservaTurismo->nombre_cliente,
                'contacto_cliente'=>$reservaTurismo->contacto_cliente,
                'fecha_reserva'=>$reservaTurismo->fecha_reserva,
                'hora_inicio'=>$reservaTurismo->hora_inicio,
                'hora_final'=>$reservaTurismo->hora_final,
                'guia_encargado'=>$reservaTurismo->guia_encargado,
                'cantidad_personas'=>$reservaTurismo->cantidad_personas,
                'costo_turismo'=>$reservaTurismo->costo_turismo,
                'estado_carrera'=>$reservaTurismo->estado_carrera,
                'id_paquetes'=>$reservaTurismo->id_paquetes,
                'id_persona'=>$reservaTurismo->id_persona
            ]);
            return $model->save();
        }

        public function updateReservaTurismo($id, ReservaTurismo $reservaTurismo): bool
        {
            $model = ReservaTurismoORM::query()->findOrFail($id);

            return $model->update([
                'nombre_cliente'=>$reservaTurismo->nombre_cliente,
                'contacto_cliente'=>$reservaTurismo->contacto_cliente,
                'fecha_reserva'=>$reservaTurismo->fecha_reserva,
                'hora_inicio'=>$reservaTurismo->hora_inicio,
                'hora_final'=>$reservaTurismo->hora_final,
                'guia_encargado'=>$reservaTurismo->guia_encargado,
                'cantidad_personas'=>$reservaTurismo->cantidad_personas,
                'costo_turismo'=>$reservaTurismo->costo_turismo,
                'estado_carrera'=>$reservaTurismo->estado_carrera,
                'id_paquetes'=>$reservaTurismo->id_paquetes,
                'id_persona'=>$reservaTurismo->id_persona
            ]);
            
        }

        public function getReservaTurismo($id): ReservaTurismo|null
        {
            $model = ReservaTurismoORM::query()->findOrFail($id);
            return $this->makeReservaTurismoFrom($model);
        }

        public function deleteReservaTurismo($id): bool
        {
            $affected = ReservaTurismoORM::destroy($id);
            return $affected > 0;
        }

        public function getReservasTurismo($id): array
        {
            $list = [];

            $registros = ReservaTurismoORM::join('personas','reserva_turismo.id_persona','=','personas.id_persona')
            ->join('paquetes_turismo','reserva_turismo.id_paquetes','=','paquetes_turismo.id_paquetes')
            ->select(
                'reserva_turismo.id_reserva_turismo',
                'reserva_turismo.nombre_cliente',
                'reserva_turismo.contacto_cliente',
                'reserva_turismo.fecha_reserva',
                'reserva_turismo.hora_inicio',
                'reserva_turismo.hora_final',
                'reserva_turismo.guia_encargado',
                'reserva_turismo.cantidad_personas',
                'reserva_turismo.costo_turismo',
                'reserva_turismo.estado_carrera',
                'personas.nombre_persona as nombre_persona',
                'paquetes_turismo.nombre_paquetes as nombre_paquetes',
                'paquetes_turismo.descripcion_paquetes as descripcion_paquetes'

            )->get();

            foreach($registros as $model)
            {
                $list[$model->id_reserva_turismo] = $this->makeReservaTurismoFrom($model);
            }

            return $list;
        }

        public function getReservaTurismoAll(): array
        {
            $list = [];

            foreach (ReservaTurismoORM::all() as $model)
            {
                $list[$model->id_reserva_turismo] = $this->makeReservaTurismoFrom($model);
            }
            return $list;
        }

        protected function makeReservaTurismoFrom(ReservaTurismoORM $reservaTurismo) : ReservaTurismo
        {
            return new ReservaTurismo(
                $reservaTurismo->id_reserva_turismo,
                $reservaTurismo->nombre_cliente,
                $reservaTurismo->contacto_cliente,
                $reservaTurismo->fecha_reserva,
                $reservaTurismo->hora_inicio,
                $reservaTurismo->hora_final,
                $reservaTurismo->guia_encargado,
                $reservaTurismo->cantidad_personas,
                $reservaTurismo->costo_turismo,
                $reservaTurismo->estado_carrera,
                $reservaTurismo->id_paquetes,
                $reservaTurismo->id_persona
            );
        }

        public function getLastReservaTurismoId(): int
        {
            $ultimoId = ReservaTurismoORM::latest('id_reserva_turismo')->first('id_reserva_turismo');

            if($ultimoId === null)
            {
                return 1;
            }
            return ($ultimoId->id_reserva_turismo + 1);
        }
        
    }

?>