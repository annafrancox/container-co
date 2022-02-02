@extends('admin.layouts.sistema')

@section('content')

@component('admin.components.edit')
    @slot('title', 'Editar Container')
    @slot('url', route('containers.update', $container->id))
    @slot('form')
        @include('admin.containers.form')
    @endslot
@endcomponent

@endsection

