<div class="col-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title title-form titlebox">{{ $title ?? null }} </h3>
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-4 pt-3">
            {{ $body ?? null }}
            {{ $footer ?? null }}
        </div>
    </div>
</div>
