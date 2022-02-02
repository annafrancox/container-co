@extends('admin.layouts.sistema')
@section('content')

@component('admin.components.table')
    @slot('create', route('categories.create'))
    @slot('title', 'Categorias')
    @slot('head')
        <th width="90%">Nome</th>
        <th width="10%"></th>
    @endslot
    @slot('body')
        @foreach ($categories as $category)
            <tr class="deletable">
                <td>{{ $category->name }}</td>
                <td class="options">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>

                    <form class="form-delete" action="{{ route('categories.destroy', $category->id) }}" method="post">
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
