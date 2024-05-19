<?php 

    namespace App\DDD\Infraestructure\Repository\Eloquent;

    use Carbon\Traits\Timestamp;
    use Illuminate\Database\Eloquent\Model;

    class PaquetesORM extends Model
    {
        protected $table = 'paquetes_turismo';

        protected $primaryKey = 'id_paquetes';

        protected $fillable =[
            'id_paquetes',
            'nombre_paquetes',
            'descripcion_paquetes'
        ];

        public $timestamps = false;
    }

?>