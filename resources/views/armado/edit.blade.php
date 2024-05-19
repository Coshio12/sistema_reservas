@extends('theme.base')

<div class="container card">
    <form action="{{ route('armado.update', ['id' => $tipo_armado->id_armado ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @include('armado.form')
    </form>
</div>