@extends('theme.base')

<div class="container pb-2 overflow-x-auto">
    <form action="{{ url('/reservaTurismo/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('reservaTurismo.form')
    </form>
</div>