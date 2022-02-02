@extends('admin.layouts.sistema')

@section('content')

@component('admin.components.create')
    @slot('title', 'Cadastrar Categoria')
    @slot('url', route('categories.store'))
    @slot('form')
        @include('admin.categories.form')
    @endslot
@endcomponent

@endsection
