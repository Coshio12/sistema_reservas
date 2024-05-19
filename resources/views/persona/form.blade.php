@extends('theme.base')    
    <div>        
        <div class="mb-3">
            <label for="nombre_persona" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('nombre_persona') is-invalid @enderror" id="nombre_persona" name="nombre_persona" placeholder="Ingresar Nombre" value="{{ isset($persona->nombre_persona)?$persona->nombre_persona:old('nombre_persona')}}" required autofocus>
            @error('nombre_persona')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="apellido_persona" class="form-label">Apellido</label>

            <input type="text" class="form-control @error('apellido_persona') is-invalid @enderror" id="apellido_persona" name="apellido_persona" value="{{ isset($persona->apellido_persona)?$persona->apellido_persona:old('apellido_persona')}}" placeholder="Ingresar Apellido" required>
            @error('apellido_persona')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="celular_persona" class="form-label">Celular</label>
            <input type="number" class="form-control @error('celular_persona') is-invalid @enderror" id="celular_persona" name="celular_persona" value="{{ isset($persona->celular_persona)?$persona->celular_persona:old('celular_persona')}}" placeholder="Ingresar Numero de Celular" required>
            @error('celular_persona')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="correo_persona" class="form-label">Correo</label>

            <input type="email" class="form-control @error('correo_persona') is-invalid @enderror" id="correo_persona" name="correo_persona" value="{{ isset($persona->correo_persona)?$persona->correo_persona:old('correo_persona')}}" placeholder="Ingresar Correo Electronico" required>
            @error('correo_persona')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>


        <div class="row mb-12">
          <label></label>
          <div class="col-sm-12">
              <button type="submit" class="focus:outline-none px-4 bg-teal-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">Guardar</button>

              <button
                    class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300 modal-close">Cancel</button>
          </div>
      </div>
        


    </div>
