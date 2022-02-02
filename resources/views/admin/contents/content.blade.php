
<div id="contents">
    <div class="card mb-0">
      <div class="card-header text-left" id="headingImage">
        <h5 class="mb-0">
          <button type="button" class="btn btn-link collapsed show" data-toggle="collapse" data-target="#imageCollapse" aria-expanded="false" aria-controls="imageCollapse">
               Imagens
          </button>
        </h5>
      </div>
      <div id="imageCollapse" class="collapse show" aria-labelledby="headingOne" data-parent="#contents">
        <div class="card-body mb-5" id="img-body">
            @foreach($contents as $content)
                @if(strstr($content->type,'image/'))
                    @include('admin.contents.imgContent', ['content' => $content, 'box' => $box])
                @endif
            @endforeach
        </div>
      </div>
    </div>
    <div class="card mb-0">
        <div class="card-header text-left" id="headingVideo">
            <h5 class="mb-0">
                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#videoCollapse" aria-expanded="false" aria-controls="videoCollapse">
                    Videos
                </button>
            </h5>
        </div>
        <div id="videoCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#contents">
            <div class="card-body" id="video-body">
                @foreach($contents as $content)
                    @if(strstr($content->type,'video/'))
                    @include('admin.contents.videoContent', ['content' => $content, 'box' => $box])
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="card mb-0">
        <div class="card-header text-left" id="headingPdf">
            <h5 class="mb-0">
                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#pdfCollapse" aria-expanded="false" aria-controls="pdfCollapse">
                    Pdfs
                </button>
            </h5>
        </div>
        <div id="pdfCollapse" class="collapse" aria-labelledby="headingPdf" data-parent="#contents">
            <div class="card-body" id="pdf-body">
                @foreach($contents as $content)
                    @if(strstr($content->type, 'pdf'))
                        @include('admin.contents.pdfContent', ['content' => $content, 'box' => $box])
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="card mb-0">
        <div class="card-header text-left" id="headingPdf">
            <h5 class="mb-0">
                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#docCollapse" aria-expanded="false" aria-controls="docCollapse">
                    Documentos
                </button>
            </h5>
        </div>
        <div id="docCollapse" class="collapse" aria-labelledby="headingDocs" data-parent="#contents">
            <div class="card-body">
                <ul id="doc-ul-list" class="list-group list-group-unbordered mb-3 text-left">
                    @foreach($contents as $content)
                        @if(strstr($content->type,'text/rtf') || strstr($content->type,'application/msword') || strstr($content->type,'application/vnd.openxmlformats-officedocument.wordprocessingml.document'))
                            @include('admin.contents.docContent', ['content' => $content, 'box' => $box])
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="card mb-0">
        <div class="card-header text-left" id="headingPdf">
            <h5 class="mb-0">
                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#sheetCollapse" aria-expanded="false" aria-controls="sheetCollapse">
                    Planilhas
                </button>
            </h5>
        </div>
        <div id="sheetCollapse" class="collapse" aria-labelledby="headingSheets" data-parent="#contents">
            <div class="card-body">
                <ul id="sheet-ul-list" class="list-group list-group-unbordered mb-3 text-left">
                    @foreach($contents as $content)
                        @if(strstr($content->type,'text/csv') || strstr($content->type,'application/vnd.ms-excel') || strstr($content->type,'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'))
                            @include('admin.contents.sheetContent', ['content' => $content, 'box' => $box])
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="card mb-0">
        <div class="card-header text-left" id="headingPdf">
            <h5 class="mb-0">
                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#unusualCollapse" aria-expanded="false" aria-controls="sheetCollapse">
                    Outros
                </button>
            </h5>
        </div>
        <div id="unusualCollapse" class="collapse" aria-labelledby="headingUnusuals" data-parent="#contents">
            <div class="card-body">
                <ul id="unusual-ul-list" class="list-group list-group-unbordered mb-3 text-left">
                    @foreach($contents as $content)
                        @if($content->isUsualTypes())
                            @include('admin.contents.unusualContent', ['content' => $content, 'box' => $box])
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
