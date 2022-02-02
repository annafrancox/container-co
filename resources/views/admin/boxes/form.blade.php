<div class="row">
    <div class="col-12">
        <div class="form-group">
            @if(!Route::is('boxes.show'))
                <label for="name" class="required">Nome da Content Box </label>
                <input type="text" name="name" id="name" autofocus required class="form-control" value="{{ old('name', $box->name) }}">
            @else
                <h1 class="text-center">{{ $box->name }}</h1>
            @endif
        </div>
    </div>
    @if(Route::is('boxes.edit') || Route::is('boxes.show'))
        <div class="col-12 text-center">
            @if(!Route::is('boxes.show'))
                <hr>
                <h3 class="text-center mb-3">Conteúdos</h3>
            @endif
            @include('admin.contents.content', ['contents' => $box->contents ?? ''])
        </div>
        @if(!Route::is('boxes.show'))
            @can('create', $box)
                <div class="form-group col-12 mt-4 d-block">  
                    <label for="content_list[]">Enviar</label>
                    <input id="content" type="file" class="form-control-file" name="content_list[]" multiple>
                </div>
            @endcan
        @endif
    @endif
</div>

