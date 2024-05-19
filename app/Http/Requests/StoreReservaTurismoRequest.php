<?php 

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreReservaTurismoRequest extends FormRequest
    {
        public function authorize()
        {
            return true;
        }

        public function rules()
        {
            return [
                
                'nombre_cliente'=>'required',
                'contacto_cliente'=>'required',
                'fecha_reserva'=>'required',
                'hora_inicio'=>'required',
                'hora_final'=>'required',
                'guia_encargado'=>'required',
                'cantidad_personas'=>'required',
                'costo_turismo'=>'required',
                'estado_carrera'=>'required',
                'id_paquetes'=>'required',
                'id_persona'=>'required'

            ];

        }

        public function messages(){
            return [
                
                'nombre_cliente.required'=>'Este campo es necesario',
                'contacto_cliente.required'=>'Este campo es necesario',
                'fecha_reserva.required'=>'Este campo es necesario',
                'hora_inicio.required'=>'Este campo es necesario',
                'hora_final.required'=>'Este campo es necesario',
                'guia_encargado.required'=>'Este campo es necesario',
                'cantidad_personas.required'=>'Este campo es necesario',
                'costo_turismo.required'=>'Este campo es necesario',
                'estado_carrera.required'=>'Este campo es necesario',
                'id_paquetes.required'=>'Este campo es necesario',
                'id_persona.required'=>'Este campo es necesario'

            ];
        }
    }

?>