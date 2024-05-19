<?php 

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreArmadoRequest extends FormRequest
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

        public function rules()
        {
            return [
                
                'nombre_armado'=>'required'
                
            ];
        }

        public function messages(){
            return [
                
                'nombre_armado.required'=>'Este campo es necesario'
            ];
        }
    }

?>