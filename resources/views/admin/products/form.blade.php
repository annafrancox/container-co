<div class="row">
    <div class="form-group col-12">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" class="form-control" required autofocus value="{{ old('name',$product->name) }}">
    </div>
    <div class="form-group col-md-6 col-12">
        <label for="container_id" class="required">Container </label>
        <select class="form-control select2" name="container_id" id="container_id" required value="{{ old('container_id', $product->container_id) }}">
            @foreach($containers as $container)
                <option value="{{ $container->id }}">{{ $container->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 col-12">
        <label for="category_id" class="required">Container </label>
        <select class="form-control select2" name="category_id" id="category_id" required value="{{ old('category_id', $product->category_id) }}">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 col-12">
        <label for="amount" class="required">Quantidade </label>
        <input type="number" name="amount" id="amount" class="form-control" required autofocus value="{{ old('amount',$product->amount) }}">
    </div>
    <div class="form-group col-md-6 col-12">
        <label for="price" class="required">Preço </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">R$</span>
            </div>
            <input type="number" class="form-control" name="price" id="price" aria-describedby="basic-addon1">
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function() {
            $('.select2').select2({
                'placeholder': 'Selecione'
            });
        });
    </script>
@endpush