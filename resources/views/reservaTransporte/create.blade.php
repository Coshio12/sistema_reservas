@extends('theme.base')

<div class="container pb-2 overflow-x-auto">
    <form action="{{ url('/reservaTransporte/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('reservaTransporte.form')
    </form>
</div>