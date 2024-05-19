@extends('theme.base')

<body>
    <div class="w-full overflow-x-auto">
        {{-- Nombre Cliente --}}
        <div class="mb-3 pt-3">
            <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
            <input type="text" class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('nombre_cliente') is-invalid @enderror" id="nombre_cliente" name="nombre_cliente" placeholder="Ingresar Nombre del cliente" value="{{ isset($reserva_turismo->nombre_cliente)?$reserva_turismo->nombre_cliente:old('nombre_cliente')}}" required autofocus>
            @error('nombre_cliente')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
    
        {{-- Contacto Cliente --}}
        <div class="mb-3 pt-3">
            <label for="contacto_cliente" class="form-label">Contacto del cliente</label>
            <input type="number" class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('contacto_cliente') is-invalid @enderror" id="contacto_cliente" name="contacto_cliente" placeholder="Ingresar Contacto Cliente" value="{{ isset($reserva_turismo->contacto_cliente)?$reserva_turismo->contacto_cliente:old('contacto_cliente')}}" required autofocus>
            @error('contacto_cliente')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
    
        
        {{-- Fecha --}}
        <div class="mb-3 pt-3">
          <label for="fecha_reserva" class="form-label">Fecha de la Reserva</label>
          <input type="date" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md form-control @error('fecha_reserva') is-invalid @enderror" id="fecha_reserva" name="fecha_reserva" placeholder="Ingresar Fecha de la Reserva" value="{{ isset($reserva_turismo->fecha_reserva)?$reserva_turismo->fecha_reserva:old('fecha_reserva')}}" required autofocus>
          @error('fecha_reserva')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>


        {{-- Hora Inicio --}}
        <div class="mb-3 pt-3">
            <label for="hora_inicio" class="form-label">Hora de Inicio</label>
            <input type="time" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md form-control @error('hora_inicio') is-invalid @enderror" id="hora_inicio" name="hora_inicio" placeholder="Ingresar Hora de la Reserva" value="{{ isset($reserva_turismo->hora_inicio)?$reserva_turismo->hora_inicio:old('hora_inicio')}}" required autofocus>
            @error('hora_inicio')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>


        {{-- Hora Final--}}
        <div class="mb-3 pt-3">
            <label for="hora_final" class="form-label">Hora de Final</label>
            <input type="time" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md form-control @error('hora_final') is-invalid @enderror" id="hora_final" name="hora_final" placeholder="Ingresar Hora de la Reserva" value="{{ isset($reserva_turismo->hora_final)?$reserva_turismo->hora_final:old('hora_final')}}" required autofocus>
            @error('hora_final')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>


        {{-- Guia Encargado --}}
        <div class="row mb-3 pt-3">
            <label for="guia_encargado" class="col-sm-1 col-form-label form-label">Estado Carrera</label>
            <div class="col-sm-4">
              <select class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('guia_encargado') is-invalid @enderror" name="guia_encargado" id="guia_encargado" value="{{ ('guia_encargado') }}">
                <option value="">Seleccionar Encargado</option>
                
                  <option value="Ing. Marcelo Sosa">{{ __('Ing. Marcelo Sosa')}}</option>
                  <option value="Sergio">{{ __('Sergio')}}</option>
                
              </select>
              @error('guia_encargado')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>



        {{-- Cantidad personas --}}
        <div class="mb-3 pt-3">
            <label for="cantidad_personas" class="form-label">Cantidad Personas</label>
            <input type="number" class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('cantidad_personas') is-invalid @enderror" id="cantidad_personas" name="cantidad_personas" placeholder="Número de Personas" value="{{ isset($reserva_turismo->cantidad_personas)?$reserva_turismo->cantidad_personas:old('cantidad_personas')}}" required autofocus>
            @error('cantidad_personas')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
    
    
        {{-- Costo --}}
        <div class="mb-3 pt-3">
            <label for="costo_turismo" class="form-label">Costo del Turismo</label>
            <input type="number" class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('costo_turismo') is-invalid @enderror" id="costo_turismo" name="costo_turismo" placeholder="Precio Turismo" value="{{ isset($reserva_turismo->costo_turismo)?$reserva_turismo->costo_turismo:old('costo_turismo')}}" required autofocus>
            @error('costo_turismo')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
    
        

        {{-- Personal --}}
        <div class="row mb-3 pt-3">
            <label for="id_persona" class="col-sm-1 col-form-label form-label">Personal</label>
            <div class="col-sm-4">
              <select class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('id_persona') is-invalid @enderror" name="id_persona" id="id_persona" value="{{old('id_persona') }}">
                <option value="">Seleccionar Personal</option>
                @foreach ($personas as $persona)
                  <option value="{{ $persona->id_persona }}">{{ $persona->nombre_persona }}</option>
                @endforeach
              </select>
              @error('id_persona')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        
      
    
        {{-- Estado --}}
        <div class="row mb-3 pt-3">
          <label for="estado_carrera" class="col-sm-1 col-form-label form-label">Estado Carrera</label>
          <div class="col-sm-4">
            <select class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('estado_carrera') is-invalid @enderror" name="estado_carrera" id="estado_carrera" value="{{old('estado_carrera') }}">
              <option value="">Seleccionar Estado</option>
              
                <option value="Pendiente">{{ __('Pendiente')}}</option>
                <option value="Completado">{{ __('Completado')}}</option>
                <option value="Cancelado">{{ __('Cancelado')}}</option>
              
            </select>
            @error('estado_carrera')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
    
        {{-- Botones --}}
        <div class="row mb-12 pt-3">
          <label></label>
          <div class="col-sm-12 p-2 pt-2 d-flex justify-content-end">  {{-- <button type="submit" class="focus:outline-none px-4 bg-red p-3 ml-3 rounded-lg text-black hover:bg-teal-400">Guardar</button> --}}
            <x-primary-button class="ms-3">
              {{ __('Guardar') }}
            </x-primary-button>
        
            <button class="w-40 bg-white tracking-wide text-gray-800 font-bold rounded border-b-2 border-gray-400 hover:border-gray-400 hover:bg-gray-400 hover:text-white shadow-md py-2 px-6 inline-flex items-center text-center justify-center modal-close">  Cancel
            </button>
          </div>
        </div>
        
    
    </div>

    <script>
      const cantidadPersonasInput = document.getElementById('cantidad_personas');
      const costoTurismoInput = document.getElementById('costo_turismo');

      cantidadPersonasInput.addEventListener('change', function()
      {
        
        const cantidadPersonas = parseInt(this.value);

        let costo;
        if(cantidadPersonas > 0){
          switch (cantidadPersonas)
          {
            case 1:
              costo = 400;
              break;
            case 2:
              costo = cantidadPersonas*225;
              break;
            case 3: 
              costo = cantidadPersonas*160;
              break;
            case 4:
              costo = cantidadPersonas*150;
            default:
              costo = cantidadPersonas*150;
              break;
          }

          costoTurismoInput.value = costo;
        }else{
          alert('Numero de personas no Valido');
        }
      });

    </script>
    
    
</body>