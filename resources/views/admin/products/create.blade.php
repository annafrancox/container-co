@extends('admin.layouts.sistema')

@section('content')

@component('admin.components.create')
    @slot('title', 'Cadastrar Produto')
    @slot('url', route('products.store'))
    @slot('form')
        @include('admin.products.form')
    @endslot
@endcomponent

@endsection
