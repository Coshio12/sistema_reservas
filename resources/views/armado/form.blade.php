@extends('theme.base')
<div>
    <div class="mb-3">
        <label for="nombre_armado" class="form-label">Nombre del Armado para el Salon</label>
        <input type="text" class="form-control @error('nombre_armado') is-invalid @enderror" id="nombre_armado" name="nombre_armado" placeholder="Ingresar Nombre" value="{{ isset($tipo_armado->nombre_armado)?$tipo_armado->nombre_armado:old('nombre_armado')}}" autofocus>
        @error('nombre_armado')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror


        <div class="row mb-12">
            <label></label>
            <div class="col-sm-12">
                <button type="submit" class="focus:outline-none px-4 bg-teal-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">Guardar</button>
  
                <button
                      class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300 modal-close">Cancel</button>
            </div>
    </div>
</div>