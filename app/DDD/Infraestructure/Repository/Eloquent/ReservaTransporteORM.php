<?php 

    namespace App\DDD\Infraestructure\Repository\Eloquent;

    use Illuminate\Traits\Timestamp;
    use Illuminate\Database\Eloquent\Model;

    class ReservaTransporteORM extends Model
    {
        protected $table = 'reserva_transporte';

        protected $primaryKey = 'id_reserva_transporte';

        protected $fillable = [
            'id_reserva_transporte',
            'nombre_cliente',
            'contacto_cliente',
            'cantidad_personas',
            'recoger_de',
            'llevar_a',
            'fecha_reserva',
            'hora_reserva',
            'forma_pago',
            'costo_carrera',
            'estado_carrera',
            'id_persona'
        ];

        public function personas()
        {
            return $this->belongsTo(PersonaORM::class,'id_persona');
        }

        public $timestamps = false;
    }
?>