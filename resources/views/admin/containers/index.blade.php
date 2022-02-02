@extends('admin.layouts.sistema')
@section('content')

@component('admin.components.table')
    @slot('create', route('containers.create'))
    @slot('title', 'Containers')
    @slot('head')
        <th width="45%">Nome</th>
        <th width="45%">Capacidade total</th>
        <th width="10%"></th>
    @endslot
    @slot('body')
        @foreach ($containers as $container)
            <tr class="deletable">
                <td>{{ $container->name }}</td>
                <td>{{ $container->total_amount }}</td>
                <td class="options">
                    <a href="{{ route('containers.edit', $container->id) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>

                    <form class="form-delete" action="{{ route('containers.destroy', $container->id) }}" method="post">
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
