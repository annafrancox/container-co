@extends('admin.layouts.app')

@section('content')
    @component('admin.components.edit')
        @slot('title', 'Editar Informações do Usuário')
        @slot('url', route('user.update', $user->id))
        @slot('form')
            @include('admin.users.form')
        @endslot
    @endcomponent
@endsection
