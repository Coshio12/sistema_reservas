<?php 
    namespace App\DDD\Infraestructure\Repository\Eloquent;

    use Carbon\Traits\Timestamp;
    use Illuminate\Database\Eloquent\Model;

    class PersonaORM extends Model{
        protected $table = 'personas';

        protected $primaryKey = 'id_persona';

        protected $fillable = [
            'id_persona',
            'nombre_persona',
            'apellido_persona',
            'celular_persona', 
            'correo_persona'
        ];

        public $timestamps = false;
    }
?>