<?php 

    namespace App\DDD\Infraestructure\Repository\Eloquent;

    use Carbon\Traits\Timestamp;
    use Illuminate\Database\Eloquent\Model;

    class SalonORM extends Model
    {
        protected $table = 'salon';

        protected $primaryKey = 'id_salon';

        protected $fillable = [
            'id_salon',
            'nombre_salon',
            'capacidad_salon',
            'descripcion_salon'
        ];

        public $timestamps = false;
    }

?>