@extends('admin.layouts.sistema')

@section('content')

    @component('admin.components.create')
        @slot('title', 'Criar Content Box')
        @slot('url', route('boxes.store'))
        @slot('form')
            @include('admin.boxes.form')
        @endslot
    @endcomponent

@endsection