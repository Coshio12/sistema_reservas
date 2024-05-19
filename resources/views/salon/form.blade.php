@extends('theme.base')

<div>
    {{-- NOMBRE SALON --}}
    <div class="mb-3">
        <label for="nombre_salon" class="form-label">Nombre Salon</label>
        <input type="text" class="form-control @error('nombre_salon') is-invalid @enderror" id="nombre_salon" name="nombre_salon" placeholder="Ingresar Nombre del Salon" value="{{ isset($salon->nombre_salon)?$salon->nombre_salon:old('nombre_salon')}}" required autofocus>
        @error('nombre_salon')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
    </div>

    {{-- CAPACIDAD SALON --}}
    <div class="mb-3">
        <label for="capacidad_salon" class="form-label">Capacidad de Personas</label>
        <input type="number" class="form-control @error('capacidad_salon') is-invalid @enderror" id="capacidad_salon" name="capacidad_salon" value="{{ isset($salon->capacidad_salon)?$salon->capacidad_salon:old('capacidad_salon')}}" placeholder="Ingresar cantidad de personas" required>
        @error('capacidad_salon')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
    </div>


    {{-- DESCRIPCION SALON --}}
    <div class="mb-3">
        <label for="descripcion_salon" class="form-label">Descripcion Salon</label>
        <input type="text" class="form-control @error('descripcion_salon') is-invalid @enderror" id="descripcion_salon" name="descripcion_salon" placeholder="Ingresar Descripcion Salon" value="{{ isset($salon->descripcion_salon)?$salon->descripcion_salon:old('descripcion_salon')}}" required autofocus>
        @error('descripcion_salon')
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