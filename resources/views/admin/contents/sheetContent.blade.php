<li class="deletable list-group-item sheet-list">
    <i class="text-olive fas fa-file-excel ml-3"></i> 
    {{ $content->name }}
    @can('delete', $content)
        @if(Route::is('boxes.edit') || isset($ajax))
            <button data-id="{{ $content->id }}" type="button" class="button-delete btn btn-outline-danger float-right btn-sm border-0 rounded-circle"><i class="fas fa-trash-alt"></i></button>
        @endif
    @endcan
    <button type="button" data-id="{{ $content->id }}" class="button-download btn btn-outline-primary float-right btn-sm border-0 rounded-circle"><i class="fas fa-download"></i></button>
</li>