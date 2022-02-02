<div class="deletable img-card card card-dark card-outline border-left-0 border-right-0 border-bottom-0 col-md-5 col-8 d-inline-block mx-auto mx-md-3 mb-3 p-1 align-top" style="max-width:400px">
    <div style="max-width:400.2px" class="mx-auto card-header border-right border-left border-bottom-0">
        {{ $content->name }}
    </div>
    <div class="card-body m-0 p-0">
        <div class="text-center w-100 m-0 p-0">
            <img load="lazy" class="w-100 img-fluid m-0 p-0 border border-top-0 border-bottom-0" style="max-height:400px; max-width:400px" src="{{ asset($content->file_path) }}" alt="Imagem não encontrada!">
        </div>
    </div>
    <div class="card-footer p-1 mb-5">
        @can('delete', $content)
            @if(Route::is('boxes.edit') || isset($ajax))
                <button data-id="{{ $content->id }}" type="button" class="button-delete btn btn-outline-danger float-left btn-sm border-0 rounded-circle"><i class="fas fa-trash-alt"></i></button>
                <button type="button" data-content-id="{{ $content->id }}" data-box-id="{{ $box->id }}" type="button" 
                    class="{{ $box->banner != null && $box->banner->id == $content->id ? 'bg-transparent' : '' }} 
                            button-banner btn btn-outline-warning float-right btn-sm border-0 rounded-circle">
                    <i class="icon-banner {{ $box->banner != null && $box->banner->id == $content->id ? 'text-warning fas fa-star' : 'text-dark far fa-star' }}"></i>
                </button>
            @endif
        @endcan
        <button type="button" data-id="{{ $content->id }}" class="button-download btn btn-outline-primary float-right btn-sm border-0 rounded-circle"><i class="fas fa-download"></i></button>
    </div>
</div>