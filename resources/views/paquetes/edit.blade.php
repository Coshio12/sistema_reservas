@extends('theme.base')

<div class="container card">
    <form action="{{ route('paquetes.update', ['id' => $paquetes_turismo->id_paquetes ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @include('paquetes.form')
    </form>
</div>