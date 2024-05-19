<?php 

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StorePaquetesRequest extends FormRequest
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
                
                'nombre_paquetes'=>'required',
                'descripcion_paquetes'=>'required'
                
            ];
        }

        public function messages(){
            return [
                
                'nombre_paquetes.required'=>'Este campo es necesario',
                'descripcion_paquetes.required'=>'Este campo es necesario'                
            ];
        }
    }

?>