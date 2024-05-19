@extends('theme.base')

<div class="container card">
    <form action="{{ route('salon.update', ['id' => $salon->id_salon ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @include('salon.form')
    </form>
</div>