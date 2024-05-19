<?php 
    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StorePersonaRequest extends FormRequest
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
                
                'nombre_persona'=>'required',
                'apellido_persona'=>'required',
                'celular_persona'=>'required',
                'correo_persona'=>'required'
            ];
        }

        public function messages(){
            return [
                
                'nombre_persona.required'=>'Este campo es necesario',
                'apellido_persona.required'=>'Este campo es necesario',
                'celular_persona.required'=>'Este campo es necesario',
                'correo_persona.required'=>'Este campo es necesario'
            ];
        }
    }

?>