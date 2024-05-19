<?php 

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreReservaTransporteRequest extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize()
        {
            return true;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, mixed>
         */
        public function rules()
        {
            
            return [
                
                'nombre_cliente'=>'required',
                'contacto_cliente'=>'required',
                'cantidad_personas'=>'required',
                'recoger_de'=>'required',
                'llevar_a'=>'required',
                'fecha_reserva'=>'required',
                'hora_reserva'=>'required',
                'forma_pago'=>'required',
                'costo_carrera'=>'required',
                'estado_carrera'=>'required',
                'id_persona'=>'required'


            ];
        }

        public function messages(){
            return [
                
                'nombre_cliente.required'=>'Este campo es necesario',
                'contacto_cliente.required'=>'Este campo es necesario',
                'cantidad_personas.required'=>'Este campo es necesario',
                'recoger_de.required'=>'Este campo es necesario',
                'llevar_a.required'=>'Este campo es necesario',
                'fecha_reserva.required'=>'Este campo es necesario',
                'hora_reserva.required'=>'Este campo es necesario',
                'forma_pago.required'=>'Este campo es necesario',
                'costo_carrera.required'=>'Este campo es necesario',
                'estado_carrera.required'=>'Este campo es necesario',
                'id_persona.required'=>'Este campo es necesario'
            ];
        }
    }

?>