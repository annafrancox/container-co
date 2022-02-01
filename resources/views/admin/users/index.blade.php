@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('title', 'Listagem de usuários')
        @slot('create', route('user.create'))
        @slot('head')
            <td>Nome</td>
            <td>Email</td>
            <td>Nível de acesso</td>
            <td></td>
        @endslot
        @slot('body')
            @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if ($user->access== 'administrador')
                            <td>Administrador</td>
                        @else
                            <td>Usuário comum</td>
                        @endif
                        <td>
                            <div class="text-center btn-list">
                                <a href="{{ route( 'user.edit', $user->id ) }}" class="btn btn-outline-primary" style="width: 40px"><i class="fas fa-pen"></i></a>
                                <form class="form-delete pl-2" action="{{ route('user.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
            @endforeach
        @endslot
    @endcomponent
@endsection
