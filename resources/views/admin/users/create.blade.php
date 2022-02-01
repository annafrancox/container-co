@extends('admin.layouts.app')

@section('content')
    @component('admin.components.create')
        @slot('title', 'Cadastre um Usuário')
        @slot('url', route('register'))
        @slot('form')
            @include ('admin.users.form')
        @endslot
    @endcomponent
@endsection
