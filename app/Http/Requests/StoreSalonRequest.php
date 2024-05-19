<?php 

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreSalonRequest extends FormRequest
    {
        public function authorize()
        {
            return true;
        }

        public function rules()
        {
            return [
                
                'nombre_salon'=>'required',
                'capacidad_salon'=>'required',
                'descripcion_salon'=>'required'
                
            ];
        }

        public function messages(){
            return [
                
                'nombre_salon.required'=>'Este campo es necesario',
                'capacidad_salon.required'=>'Este campo es necesario',
                'descripcion_salon.required'=>'Este campo es necesario'
                
            ];
        }
    }

?>