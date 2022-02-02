<div class="col-md-10 offset-md-1 col-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title title-form">{{ $title ?? null }} </h3>
        </div>
        <div class="card-body">
            <form id="form-adicionar" action="{{ $url ?? '/' }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                {{ $form ?? null }}
            </form>
            {{$body ?? null }}
        </div>
        <div class="card-footer">
            <button id="{{ isset($load) ?  'load-save-button' : '' }}" type="submit" form="form-adicionar" class="btn btn-dark float-right">{{$button_name ?? 'Salvar Alterações'}}</button>
            @if(isset($load))
                <button id="loading" class="d-none btn btn-dark float-right" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Carregando...
                </button>
            @endif
            {{ $voltar ?? null }}
        </div>
    </div>
</div>
