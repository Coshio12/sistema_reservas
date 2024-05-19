@extends('theme.base')

<div class="container">
    <form action="{{ url('/salon/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('salon.form')
    </form>
</div>