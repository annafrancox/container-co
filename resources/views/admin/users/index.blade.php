@extends('admin.layouts.sistema')
@section('content')

@component('admin.components.table')
    @slot('create', route('users.create'))
    @slot('title', 'Usuários')
    @slot('head')
        <th width="50%">Nome</th>
        <th width="40%">E-mail</th>
        <th width="10%"></th>
    @endslot
    @slot('body')
        @foreach ($users as $user)
            <tr class="deletable">
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="options">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>

                    <form class="form-delete" action="{{ route('users.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endslot
@endcomponent

@endsection

@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush
