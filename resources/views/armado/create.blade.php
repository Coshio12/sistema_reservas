@extends('theme.base')

<div class="container">
    <form action="{{ url('/armado/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('armado.form')
    </form>
</div>