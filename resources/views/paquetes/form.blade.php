@extends('theme.base')
<div>
    <div class="mb-3">
        <label for="nombre_paquetes" class="form-label">Nombre Paquete</label>
        <input type="text" class="form-control @error('nombre_paquetes') is-invalid @enderror" id="nombre_paquetes" name="nombre_paquetes" placeholder="Ingresar Nombre" value="{{ isset($paquetes_turismo->nombre_paquetes)?$paquetes_turismo->nombre_paquetes:old('nombre_paquetes')}}" required autofocus>
        @error('nombre_paquetes')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="descripcion_paquetes" class="form-label">Descripcion del Paquete</label>

        <input type="text" class="form-control @error('descripcion_paquetes') is-invalid @enderror" id="descripcion_paquetes" name="descripcion_paquetes" value="{{ isset($paquetes_turismo->descripcion_paquetes)?$paquetes_turismo->descripcion_paquetes:old('descripcion_paquetes')}}" placeholder="Ingresar Apellido" required>
        @error('descripcion_paquetes')
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