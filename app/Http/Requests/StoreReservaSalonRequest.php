<?php 

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreReservaSalonRequest extends FormRequest
    {
        public function authorize()
        {
            return true;
        }

        public function rules()
        {
            return [
                
                'nombre_evento'=>'required',
                'nombre_cliente'=>'required',
                'celular_cliente'=>'required',
                'tipo_cliente'=>'required',
                'fecha_reserva'=>'required',
                'hora_inicio'=>'required',
                'hora_final'=>'required',
                'horas_totales'=>'required',
                'tipo_periodo'=>'required',
                'costo_salon'=>'required',
                'estado_reserva'=>'required',
                'id_persona'=>'required',
                'id_salon'=>'required',
                'id_armado'=>'required'

            ];

        }

        public function messages(){
            return [
                
                'nombre_evento.required'=>'Este campo es necesario',
                'nombre_cliente.required'=>'Este campo es necesario',
                'celular_cliente.required'=>'Este campo es necesario',
                'tipo_cliente.required'=>'Este campo es necesario',
                'fecha_reserva.required'=>'Este campo es necesario',
                'hora_inicio.required'=>'Este campo es necesario',
                'hora_final.required'=>'Este campo es necesario',
                'horas_totales.required'=>'Este campo es necesario',
                'tipo_periodo.required'=>'Este campo es necesario',
                'costo_salon.required'=>'Este campo es necesario',
                'estado_reserva.required'=>'Este campo es necesario',
                'id_persona.required'=>'Este campo es necesario',
                'id_salon.required'=>'Este campo es necesario',
                'id_armado.required'=>'Este campo es necesario'


            ];
        }
    }

?>