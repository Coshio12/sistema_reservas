@extends('theme.base')

<body>
    <div class="w-full overflow-x-auto">
        {{-- Nombre Cliente --}}
        <div class="mb-3 pt-3">
            <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
            <input type="text" class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('nombre_cliente') is-invalid @enderror" id="nombre_cliente" name="nombre_cliente" placeholder="Ingresar Nombre del cliente" value="{{ isset($reserva_transporte->nombre_cliente)?$reserva_transporte->nombre_cliente:old('nombre_cliente')}}" required autofocus>
            @error('nombre_cliente')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
    
        {{-- Contacto Cliente --}}
        <div class="mb-3 pt-3">
            <label for="contacto_cliente" class="form-label">Contacto del cliente</label>
            <input type="number" class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('contacto_cliente') is-invalid @enderror" id="contacto_cliente" name="contacto_cliente" placeholder="Ingresar Contacto Cliente" value="{{ isset($reserva_transporte->contacto_cliente)?$reserva_transporte->contacto_cliente:old('contacto_cliente')}}" required autofocus>
            @error('contacto_cliente')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
    
    
        {{-- Cantidad personas --}}
        <div class="mb-3 pt-3">
            <label for="cantidad_personas" class="form-label">Cantidad Personas</label>
            <input type="number" class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('cantidad_personas') is-invalid @enderror" id="cantidad_personas" name="cantidad_personas" placeholder="Número de Personas" value="{{ isset($reserva_transporte->cantidad_personas)?$reserva_transporte->cantidad_personas:old('cantidad_personas')}}" required autofocus>
            @error('cantidad_personas')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
    
        {{-- Recoger de --}}
        <div class="mb-3 pt-3">
            <label for="recoger_de" class="form-label">De donde Recoger:</label>
            <input type="text" class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('recoger_de') is-invalid @enderror" id="recoger_de" name="recoger_de" placeholder="Ingresar Lugar" value="{{ isset($reserva_transporte->recoger_de)?$reserva_transporte->recoger_de:old('recoger_de')}}" required autofocus>
            @error('recoger_de')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
    
        {{-- Llevar a  --}}
        <div class="mb-3 pt-3">
            <label for="llevar_a" class="form-label">Llevar a:</label>
            <input type="text" class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('llevar_a') is-invalid @enderror" id="llevar_a" name="llevar_a" placeholder="Ingresar Destino" value="{{ isset($reserva_transporte->llevar_a)?$reserva_transporte->llevar_a:old('llevar_a')}}" required autofocus>
            @error('llevar_a')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
    
        {{-- Fecha --}}
        <div class="mb-3 pt-3">
            <label for="fecha_reserva" class="form-label">Fecha de la Reserva</label>
            <input type="date" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md form-control @error('fecha_reserva') is-invalid @enderror" id="fecha_reserva" name="fecha_reserva" placeholder="Ingresar Fecha de la Reserva" value="{{ isset($reserva_transporte->fecha_reserva)?$reserva_transporte->fecha_reserva:old('fecha_reserva')}}" required autofocus>
            @error('fecha_reserva')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
    
        {{-- Hora --}}
        <div class="mb-3 pt-3">
            <label for="hora_reserva" class="form-label">Hora de la Reserva</label>
            <input type="time" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md form-control @error('hora_reserva') is-invalid @enderror" id="hora_reserva" name="hora_reserva" placeholder="Ingresar Hora de la Reserva" value="{{ isset($reserva_transporte->hora_reserva)?$reserva_transporte->hora_reserva:old('hora_reserva')}}" required autofocus>
            @error('hora_reserva')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
    
        {{-- Forma Pago --}}
        <div class="mb-3 pt-3" >
            <label for="forma_pago" class="col-sm-1 col-form-label form-label">Seleccionar Forma de Pago</label>
            <label></label>
            <select class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('forma_pago') is-invalid @enderror" name="forma_pago" id="forma_pago" value="{{ old('forma_pago') }}">
              <option value="">Seleccionar Estado</option>
              
                <option value="QR">{{ __('QR')}}</option>
                <option value="Efectivo">{{ __('EFECTIVO')}}</option>
              
            </select>
            @error('forma_pago')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
    
        {{-- Costo --}}
        <div class="mb-3 pt-3">
            <label for="costo_carrera" class="form-label">Costo de la Carrera</label>
            <input type="number" class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('costo_carrera') is-invalid @enderror" id="costo_carrera" name="costo_carrera" placeholder="Precio de la Carrera" value="{{ isset($reserva_transporte->costo_carrera)?$reserva_transporte->costo_carrera:old('costo_carrera')}}" required readonly>
            @error('costo_carrera')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
    
        {{-- Personal --}}
        <div class="row mb-3 pt-3">
          <label for="id_persona" class="col-sm-1 col-form-label form-label">Personal</label>
          <div class="col-sm-4">
            <select class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('id_persona') is-invalid @enderror" name="id_persona" id="id_persona" value="{{ old('id_persona') }}">
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
            <select class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('estado_carrera') is-invalid @enderror" name="estado_carrera" id="estado_carrera" value="{{ old('estado_carrera') }}">
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
      const costoCarreraInput = document.getElementById('costo_carrera');

      // Agregar un evento onchange al campo de cantidad de personas
      cantidadPersonasInput.addEventListener('change', function() {
          // Obtener el valor de cantidad de personas
          const cantidadPersonas = parseInt(this.value);

          // Calcular el costo
          let costo;
          if (cantidadPersonas === 1) {
              costo = 30;
          } else {
              costo = cantidadPersonas * 15;
          }

          // Actualizar el valor del campo de costo de carrera
          costoCarreraInput.value = costo;
      });

    </script>
    
    
</body>