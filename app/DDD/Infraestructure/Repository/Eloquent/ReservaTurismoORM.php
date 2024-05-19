<?php 

    namespace App\DDD\Infraestructure\Repository\Eloquent;

    use Carbon\Traits\Timestamp;
    use Illuminate\Database\Eloquent\Model;

    class ReservaTurismoORM extends Model
    {
        protected $table = 'reserva_turismo';

        protected $primaryKey = 'id_reserva_turismo';

        protected $fillable = [
            'id_reserva_turismo',
            'nombre_cliente',
            'contacto_cliente',
            'fecha_reserva',
            'hora_inicio',
            'hora_final',
            'guia_encargado',
            'cantidad_personas',
            'costo_turismo',
            'estado_carrera',
            'id_paquetes',
            'id_persona'
        ];

        public $timestamps = false;

        public function personas()
        {
            return $this->belongsTo(PersonaORM::class,'id_persona');
        }

        public function paquetes_turismo()
        {
            return $this->belongsTo(PaquetesORM::class,'id_paquetes');
        }


    }

?>