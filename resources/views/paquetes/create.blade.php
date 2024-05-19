@extends('theme.base')

<div class="container">
    <form action="{{ url('/paquetes/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('paquetes.form')
    </form>
</div>