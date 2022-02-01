
<div class="row">
    <div class="form-group col-12 col-md-12">
        <label for="name" class="required">Nome completo: </label>
        <input type="text" name="name" id="name" autofocus class="form-control" required value="{{ old('name',$user->name) }}">
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label for="email" class="required">E-mail: </label>
        <input type="email" name="email" id="email" class="form-control" required value="{{ old('email',$user->email) }}">
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label for="access" class="required">Acesso:</label>
            <select class="select2-usage form-control controlselect" name="access" required value="{{ old('access',$user->access) }}">
                <option value="usuario">Usuário</option>
                <option value="administrador">Administrador</option>
            </select>
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label for="password" class="required">Senha: </label>
            <input type="password" name="password" id="password" required class="form-control">
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label for="password_confirmation" class="required">Confirme sua Senha: </label>
            <input type="password" name="password_confirmation" id="password_confirmation" required class="form-control">
    </div>
</div>

