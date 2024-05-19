<?php 

    namespace App\DDD\Infraestructure\Repository\Eloquent;
    
    use Illuminate\Traits\Timestamp;
    use Illuminate\Database\Eloquent\Model;

    class ReservaSalonORM extends Model
    {
        protected $table = 'reserva_salon';

        protected $primaryKey = 'id_reserva_salon';

        protected $fillable =[
            'id_reserva_salon',
            'nombre_evento',
            'nombre_cliente',
            'celular_cliente',
            'tipo_cliente',
            'fecha_reserva',
            'hora_inicio',
            'hora_final',
            'horas_totales',
            'tipo_periodo',
            'costo_salon',
            'estado_reserva',
            'id_persona',
            'id_salon',
            'id_armado'

        ];

        public $timestamps =false;

        public function personas()
        {
            return $this->belongsTo(PersonaORM::class,'id_persona');
        }

        public function salon()
        {
            return $this->belongsTo(SalonORM::class,'id_salon');
        }

        public function tipo_armado()
        {
            return $this->belongsTo(ArmadoORM::class,'id_armado');
        }
    }

?>