@if ($body != '' || !($createFirst ?? true) || request('search') || request('year'))
    <div class="card">
        @if (isset($create) || isset($title))
            <div class="card-header card-outline cor-backend">
                <h3 class="float-left m-0 table-title">{{ $title ?? null }}</h3>
                @if (isset($create))
                    <div class="float-right mr-2">
                        <div class="input-group input-group-sm">
                            @if(isset($pdf))
                                <a href="{{ $pdf ?? null }}" target="_blanck" class="mr-1">
                                    <button type="button" class="btn btn-dark icone-add-table">
                                        <b><i class="fas fa-file-pdf"></i> Gerar PDF</b>
                                    </button>
                                </a>
                            @endif
                            <a href="{{ $create }}" >
                                <button type="button" class="btn btn-dark icone-add-table">
                                    <b><i class="fas fa-plus-circle "></i> Adicionar</b>
                                </button>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <div class="card-body table-responsive ">
            <form id="research">
                <div class="row">
                    <div class="col-md-2 mt-1">
                        <select class="form-control select2" onchange="research()" name="year" value="{{request('year')}}">
                            <option></option>
                            <option>2015</option>
                            <option>2016</option>
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                            <option>2021</option>
                        </select>
                    </div>
                    <div class="col-sm-10 offset-md-7 col-md-3 mt-1">
                        <input type="search" class="form-control" id="search" placeholder="Pesquisar" name="search" value="{{request('search')}}">
                    </div>
                </div>
            </form>
            <table  class="table table-hover table-striped">
                <thead>
                    <tr>
                        {{ $head ?? null }}
                    </tr>
                </thead>
                <tbody id="tbody">
                    @if($body != '')
                        {{ $body ?? null }}
                    @else
                        <td>Nenhum item encontrado<td>
                        <td></td>
                        <td></td>
                    @endif
                </tbody>
            </table>
            <div style="margin-top: 40px;"></div>
            {{ $footer ?? null }}
        </div>
    </div>
@else
    <div class="text-center" style="color: #949699">
        <i class="fas fa-exclamation-circle" style="font-size: 10em"></i>
        <p class="mb-4 h2">Nenhum item encontrado!</p>
        <a href="{{ $create ?? '#' }}">
            <button type="button" class="btn btn-dark">
                <b><i class="fas fa-plus-circle"></i> Adicionar novo item</b>
            </button>
        </a>
    </div>
@endif

@push('scripts')
    <script>
        $(function() {
                $('.select2').select2({
                    placeholder: "Selecione um ano ",
                    allowClear:true,
                });
            });

        function research(){
            $("#research").submit();
        }

        $('select[value]').each(function () {
            $(this).val($(this).attr('value'));
        });

    </script>
@endpush
