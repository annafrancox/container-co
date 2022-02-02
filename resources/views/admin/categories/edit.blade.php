@extends('admin.layouts.sistema')

@section('content')

@component('admin.components.edit')
    @slot('title', 'Editar Categoria')
    @slot('url', route('categories.update', $category->id))
    @slot('form')
        @include('admin.categories.form')
    @endslot
@endcomponent

@endsection

