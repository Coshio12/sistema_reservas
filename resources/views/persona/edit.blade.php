@extends('theme.base')

<div class="container card">
    <form action="{{ route('persona.update', ['id' => $persona->id_persona ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @include('persona.form')
    </form>
</div>