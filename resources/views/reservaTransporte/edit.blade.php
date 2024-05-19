@extends('theme.base')

<div class="container card w-full max-w-xl overflow-x-auto">
    <form action="{{ route('reservaTransporte.update', ['id' => $reserva_transporte->id_reserva_transporte])}}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('reservaTransporte.form')
    </form>

</div>