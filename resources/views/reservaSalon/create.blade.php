@extends('theme.base')

<div class="container pb-2 overflow-x-auto">
    <form action="{{ url('/reservaSalon/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('reservaSalon.form')
    </form>
</div>