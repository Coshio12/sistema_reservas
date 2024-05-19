<?php 

    namespace App\DDD\Infraestructure\Repository\Eloquent;
    use Carbon\Traits\Timestamp;
    use Illuminate\Database\Eloquent\Model;

    class ArmadoORM extends Model
    {
        protected $table = 'tipo_armado';

        protected $primaryKey = 'id_armado';

        protected $fillable = [
            'id_armado',
            'nombre_armado'
        ];

        public $timestamps = false;
    }

    
?>