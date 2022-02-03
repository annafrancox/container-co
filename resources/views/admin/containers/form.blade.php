<div class="row">
    <div class="form-group col-12">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" class="form-control" required autofocus value="{{ old('category',$container->name) }}">
    </div>
    <div class="form-group col-12">
        <label for="name" class="required">Capacidade total</label>
        <input type="number" name="total_amount" id="total_amount" class="form-control" required autofocus value="{{ old('total_amount', $container->total_amount) }}">
        <small class="text-danger">{{ session('error') }}</small>
    </div>
</div>