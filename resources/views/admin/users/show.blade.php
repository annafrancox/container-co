@extends('admin.layouts.sistema')

@section('content')
    @component('admin.components.show')
        @slot('title', 'Detalhes do Usuário')
        @slot('content')
            @include('admin.users.form', ['create'=> false, 'show'=> true])
        @endslot
        @slot('back')
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary float-right ml-1"><i class="fas fa-pen"></i> Editar</a>
            @can('viewAny', \App\Models\User::class)
                <a href="{{ route('users.index') }}" class="btn btn-dark float-right"><i class="fas fa-undo-alt"></i> Voltar</a>
            @endcan
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush
