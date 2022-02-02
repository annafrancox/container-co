@extends('admin.layouts.sistema')

@push('styles')
    <style>
        .hover-grey:hover {
            background-color: #E5E5E5 !important;
            opacity: 0.8;
            transition: .25s all;
        }
    </style>
@endpush

@section('content')
    @component('admin.components.tableCard')
        @slot('title', 'Content Boxes')
        @slot('url', route('boxes.create'))
        @slot('model', App\Models\Box::class)
        @slot('card')
            @foreach($boxes as $box)
                <div class="ml-3 mt-2 deletable">
                    <div class="card card-primary card-outline border-right" style="width:300px; border-right: 2px;">
                        @can('view', $box)
                            <a class="bg-white hover-grey" href="{{ route('boxes.show', $box->id) }}">
                                <img load="lazy" class="card-img-top mx-auto hover-grey" style="height:300px; width:298px" src="{{ asset($box->bannerView ?? '') }}" alt="">
                            </a>
                        @endcan
                        <div class="card-header">
                            <h3 class="profile-username text-center my-auto text-truncate">{{ $box->name }}</h3>
                        </div>
                        <div class="card-footer options text-center">
                            @can('update', $box)
                                <a href="{{ route('boxes.edit', $box->id) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>
                            @endcan
                            @can('view', $box)
                                <a href="{{ route('boxes.show', $box->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            @endcan
                            @can('delete', $box)
                                <form class="form-delete" action="{{ route('boxes.destroy', $box->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger "><i class="fas fa-trash"></i></button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            @endforeach
        @endslot
        @slot('footer')
            <span class="mt-5">Mostrando de {{ $boxes->firstItem() }} até {{ $boxes->lastItem() }} de {{ $boxes->total() }} registros</span>
            <span class="float-right mt-2">
                    {{ $boxes->links("pagination::bootstrap-4") }}
            </span>
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush