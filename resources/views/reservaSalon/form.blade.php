@extends('theme.base')

<body>
    <div class="w-full overflow-x-auto">
        {{-- Nombre Evento --}}
        <div class="mb-3 pt-3">
            <label for="nombre_evento" class="form-label">Nombre del Evento</label>
            <input type="text" class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('nombre_evento') is-invalid @enderror" id="nombre_evento" name="nombre_evento" placeholder="Ingresar Nombre del cliente" value="{{ isset($reserva_salon->nombre_evento)?$reserva_salon->nombre_evento:old('nombre_evento')}}" required autofocus>
            @error('nombre_evento')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>

        {{-- Nombre Cliente --}}
        <div class="mb-3 pt-3">
            <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
            <input type="text" class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('nombre_cliente') is-invalid @enderror" id="nombre_cliente" name="nombre_cliente" placeholder="Ingresar Nombre del cliente" value="{{ isset($reserva_salon->nombre_evento)?$reserva_salon->nombre_cliente:old('nombre_cliente')}}" required autofocus>
            @error('nombre_cliente')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
    
        {{-- Contacto Cliente --}}
        <div class="mb-3 pt-3">
            <label for="celular_cliente" class="form-label">Contacto del cliente</label>
            <input type="number" class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('celular_cliente') is-invalid @enderror" id="celular_cliente" name="celular_cliente" placeholder="Ingresar Contacto Cliente" value="{{ isset($reserva_salon->celular_cliente)?$reserva_salon->celular_cliente:old('celular_cliente')}}" required autofocus>
            @error('celular_cliente')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>


        {{-- Tipo Cliente --}}
        <div class="row mb-3 pt-3">
            <label for="tipo_cliente" class="col-sm-1 col-form-label form-label">Tipo Cliente</label>
            <div class="col-sm-4">
              <select class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('tipo_cliente') is-invalid @enderror" name="tipo_cliente" id="tipo_cliente" value="{{ ('tipo_cliente') }}">
                <option value="">Seleccionar Tipo Cliente</option>
                
                  <option value="Ejecutivo">{{ __('EJECUTIVO')}}</option>
                  <option value="Normal">{{ __('NORMAL')}}</option>
                
              </select>
              @error('tipo_cliente')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
    
        
        {{-- Fecha --}}
        <div class="mb-3 pt-3">
          <label for="fecha_reserva" class="form-label">Fecha de la Reserva</label>
          <input type="date" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md form-control @error('fecha_reserva') is-invalid @enderror" id="fecha_reserva" name="fecha_reserva" placeholder="Ingresar Fecha de la Reserva" value="{{ isset($reserva_salon->fecha_reserva)?$reserva_salon->fecha_reserva:old('fecha_reserva')}}" required autofocus>
          @error('fecha_reserva')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>


        {{-- Hora Inicio --}}
        <div class="mb-3 pt-3">
            <label for="hora_inicio" class="form-label">Hora de Inicio</label>
            <input type="time" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md form-control @error('hora_inicio') is-invalid @enderror" id="hora_inicio" name="hora_inicio" placeholder="Ingresar Hora de la Reserva" value="{{ isset($reserva_salon->hora_inicio)?$reserva_salon->hora_inicio:old('hora_inicio')}}" required autofocus>
            @error('hora_inicio')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>


        {{-- Hora Final--}}
        <div class="mb-3 pt-3">
            <label for="hora_final" class="form-label">Hora de Final</label>
            <input type="time" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md form-control @error('hora_final') is-invalid @enderror" id="hora_final" name="hora_final" placeholder="Ingresar Hora de la Reserva" value="{{ isset($reserva_salon->hora_final)?$reserva_salon->hora_final:old('hora_final')}}" required autofocus>
            @error('hora_final')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>


        {{-- Hora Totales--}}
        <div class="mb-3 pt-3">
            <label for="horas_totales" class="form-label">Hora de Totales</label>
            <input type="number" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md form-control @error('horas_totales') is-invalid @enderror" id="horas_totales" name="horas_totales" placeholder="Ingresar Hora de la Reserva" value="{{ isset($reserva_salon->horas_totales)?$reserva_salon->horas_totales:old('horas_totales')}}" required autofocus>
            @error('horas_totales')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>


        {{-- Tipo Periodo --}}
        <div class="row mb-3 pt-3">
            <label for="tipo_periodo" class="col-sm-1 col-form-label form-label">Periodo De Reserva</label>
            <div class="col-sm-4">
              <select class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('tipo_periodo') is-invalid @enderror" name="tipo_periodo" id="tipo_periodo" value="{{ ('tipo_periodo') }}">
                <option value="">Seleccionar Periodo</option>
                
                  <option value="Jornada">{{ __('JORNADA')}}</option>
                  <option value="Media Jornada">{{ __('MEDIA JORNADA')}}</option>
                
              </select>
              @error('tipo_periodo')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
    
    
        {{-- Costo Salon --}}
        <div class="mb-3 pt-3">
            <label for="costo_salon" class="form-label">Costo del Salon</label>
            <input type="number" class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('costo_salon') is-invalid @enderror" id="costo_salon" name="costo_salon" placeholder="costo_salon Turismo" value="{{ isset($reserva_salon->costo_salon)?$reserva_salon->costo_salon:old('costo_salon')}}" required autofocus>
            @error('costo_salon')
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


          {{-- Salon --}}
        <div class="row mb-3 pt-3">
            <label for="id_salon" class="col-sm-1 col-form-label form-label">Personal</label>
            <div class="col-sm-4">
              <select class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('id_salon') is-invalid @enderror" name="id_salon" id="id_salon" value="{{old('id_salon') }}">
                <option value="">Seleccionar Salon</option>
                @foreach ($salon as $salon)
                  <option value="{{ $salon->id_salon }}">{{ $salon->nombre_salon }}</option>
                @endforeach
              </select>
              @error('id_salon')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>


          {{-- Armado --}}
        <div class="row mb-3 pt-3">
            <label for="id_armado" class="col-sm-1 col-form-label form-label">Personal</label>
            <div class="col-sm-4">
              <select class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('id_armado') is-invalid @enderror" name="id_armado" id="id_armado" value="{{old('id_armado') }}">
                <option value="">Seleccionar Armado</option>
                @foreach ($tipo_armado as $armado)
                  <option value="{{ $armado->id_armado }}">{{ $armado->nombre_armado }}</option>
                @endforeach
              </select>
              @error('id_armado')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        
      
    
        {{-- Estado --}}
        <div class="row mb-3 pt-3">
          <label for="estado_reserva" class="col-sm-1 col-form-label form-label">Estado Carrera</label>
          <div class="col-sm-4">
            <select class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('estado_reserva') is-invalid @enderror" name="estado_reserva" id="estado_reserva" value="{{old('estado_reserva') }}">
              <option value="">Seleccionar Estado</option>
              
                <option value="Pendiente">{{ __('Pendiente')}}</option>
                <option value="Completado">{{ __('Completado')}}</option>
                <option value="Cancelado">{{ __('Cancelado')}}</option>
              
            </select>
            @error('estado_reserva')
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