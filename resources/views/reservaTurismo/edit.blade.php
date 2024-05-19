@extends('theme.base')

<div class="container card">
    
    <form action="{{ route('reservaTurismo.update', ['id' => $reserva_turismo->id_reserva_turismo ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @include('reservaTurismo.form')
    </form>
</div>