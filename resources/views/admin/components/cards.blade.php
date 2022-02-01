@if ($body != '' || !($createFirst ?? true))
    <div class="card">
        @if (isset($create) || isset($title))
            <div class="card-header card-outline card-primary">
                <h3 class="float-left m-0 table-title">{{ $title ?? null }}</h3>
                @if (isset($create))
                    <div class="float-right mr-2">
                        <div class="input-group input-group-sm">
                            <a href="{{ $create }}">
                                <button type="button" class="btn btn-primary">
                                    <b><i class="fas fa-plus-circle"></i> Adicionar</b>
                                </button>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <div class="row row-cols-1 row-cols-md-3 g-4">
        {{ $body ?? null }}
        {{ $footer ?? null }}
        </div>
    </div>
@else
    <div class="text-center" style="color: #949699">
        <i class="fas fa-exclamation-circle" style="font-size: 10em"></i>
        <p class="mb-4 h2">Nenhum item encontrado!</p>
        <a href="{{ $create ?? '#' }}">
            <button type="button" class="btn btn-primary">
                <b><i class="fas fa-plus-circle"></i> Adicionar novo item</b>
            </button>
        </a>
    </div>
@endif

