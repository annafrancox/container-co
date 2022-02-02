@extends('admin.layouts.sistema')
@section('content')

    @component('admin.components.show')
        @slot('title', 'Detalhes da Content box')
        @slot('content')
            @include('admin.boxes.form', ['show' => true])
            <form id="form-download" action="{{ route('contents.download') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <input hidden value="" name="content_id" id="download-input">
            </form>
        @endslot
        @slot('back')
            @can('view', $box)
                <a href="{{ route('boxes.index') }}" class="btn btn-dark float-right"><i class="fas fa-undo-alt"></i> Voltar</a>
            @endcan
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $('.form-control').attr('disabled', true);

        $(document).on('click', '.button-download', function(){
            $('#download-input').attr('value', $(this).attr('data-id'));
            $('#form-download').submit();
        });
    </script>
@endpush