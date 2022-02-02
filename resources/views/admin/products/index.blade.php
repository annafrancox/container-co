@extends('admin.layouts.sistema')
@section('content')

@component('admin.components.table')
    @slot('create', route('products.create'))
    @slot('title', 'Produtos')
    @slot('head')
        <th width="25%">Nome</th>
        <th width="25%">Quantidade</th>
        <th width="25%">Container</th>
        <th width="15%"></th>
    @endslot
    @slot('body')
        @foreach ($products as $product)
            <tr class="deletable">
                <td>{{ $product->name }}</td>
                <td>{{ $product->amount }}</td>
                <td>{{ $product->container->name }}</td>
                <td class="options">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>

                    <form class="form-delete" action="{{ route('products.destroy', $product->id) }}" method="post">
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
