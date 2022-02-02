@extends('admin.layouts.sistema')

@section('content')

@component('admin.components.create')
    @slot('title', 'Cadastrar Container')
    @slot('url', route('containers.store'))
    @slot('form')
        @include('admin.containers.form')
    @endslot
@endcomponent

@endsection
