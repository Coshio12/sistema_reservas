@extends('theme.base')

<div class="container card">
    
    <form action="{{ route('reservaSalon.update', ['id' => $reserva_salon->id_reserva_salon ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @include('reservaSalon.form')
    </form>
</div>