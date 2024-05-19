@extends('theme.base')

<div class="container">
    <form action="{{ url('/persona/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('persona.form')
    </form>
</div>