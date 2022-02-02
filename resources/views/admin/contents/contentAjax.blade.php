@foreach($contents as $content)
    @if(strstr($content->type,'image/'))
       @include('admin.contents.imgContent', ['content' => $content, 'box' => $box, 'ajax' => $ajax])
    @endif
@endforeach
@foreach($contents as $content)
    @if(strstr($content->type,'video/'))
        @include('admin.contents.videoContent', ['content' => $content, 'box' => $box, 'ajax' => $ajax])
    @endif
@endforeach
@foreach($contents as $content)
    @if(strstr($content->type, 'pdf'))
        @include('admin.contents.pdfContent', ['content' => $content, 'box' => $box, 'ajax' => $ajax])
    @endif
@endforeach
@foreach($contents as $content)
    @if(strstr($content->type,'text/rtf') || strstr($content->type,'application/msword') || strstr($content->type,'application/vnd.openxmlformats-officedocument.wordprocessingml.document'))
        @include('admin.contents.docContent', ['content' => $content, 'box' => $box, 'ajax' => $ajax])
    @endif
@endforeach
@foreach($contents as $content)
    @if(strstr($content->type,'text/csv') || strstr($content->type,'application/vnd.ms-excel') || strstr($content->type,'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'))
        @include('admin.contents.sheetContent', ['content' => $content, 'box' => $box, 'ajax' => $ajax])
    @endif
@endforeach
@foreach($contents as $content)
    @if($content->isUsualTypes())
        @include('admin.contents.unusualContent', ['content' => $content, 'box' => $box])
    @endif
@endforeach
      