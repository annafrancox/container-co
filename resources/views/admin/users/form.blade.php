<div class="row">
    <div class="text-center col-sm-6 col-12 mx-auto mb-3">
        <img id="profilePreview" class="profile-user-img img-fluid img-circle" style="height: 120px;width:120px" src="{{ asset($user->profile_path ) }}" alt="Imagem de perfil">
    </div>
    <div class="form-group col-sm-6 col-12 my-auto">  
        <label for="profile_path">Imagem de Perfil</label>
        <input id="profile" type="file" accept="image/*" class="form-control-file" name="profile_path">
    </div>
    <div class="form-group col-12">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" class="form-control" required autofocus value="{{ old('name',$user->name) }}">
    </div>
    <div class="form-group col-12">
        <label for="email" class="required">E-mail </label>
        <input type="email" name="email" id="email" class="form-control" required value="{{ old('email',$user->email) }}">
    </div>
    <div class="form-group col-sm-6 col-12">
        <label for="dateBirth" class="required">Data de nascimento </label>
        <input type="date" name="dateBirth" id="dateBirth" class="form-control" required value="{{ old('dateBirth',$user->dateBirth) }}">
    </div>
    @can('create', App\Models\User::class)
        <div class="form-group col-sm-12">
            <label for="admin" class="required">Cargo </label>
            <select class="form-control select2" name="admin" id="admin" required value="{{ old('admin', $user->admin) }}">
                <option></option>
                <option value="0">Funcionário</option>
                <option value="1">Gerente</option>
            </select>
        </div>
    @endcan
    <div class="form-group col-sm-6 col-12">
        <label for="cpf" class="required">CPF </label>
        <input type="text" name="cpf" id="cpf" class="form-control" required value="{{ old('cpf',$user->cpf) }}">
    </div>
    <div class="form-group col-sm-6 col-12">
        <label for="phone" class="required">Telefone </label>
        <input type="text" name="phone" id="phone" class="form-control" required value="{{ old('phone',$user->phone) }}">
    </div>
    <div class="form-group col-sm-6 col-12">
        <label for="identity" class="required">Identificação</label>
        <input type="text" name="identity" id="identity" class="form-control" required value="{{ old('identity',$user->identity) }}">
    </div>
    @if (!Route::is('users.show'))
        <div class="form-group col-sm-12">
            <hr>
        </div>
        <div class="form-group col-sm-6 col-12">
            <label for="password" class="{{ Route::is('users.create') ? 'required' : '' }}">Senha </label>
            <i  class="far fa-question-circle"
                data-toggle="tooltip"
                data-placement="right"
                title="Mínimo 8 caracteres.">
            </i>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="clickEye">
                        <i class="fas fa-eye-slash" id="eye"></i>
                    </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" minlength="8" {{ Route::is('users.create') ? 'required' : '' }}>
            </div>
        </div>
        <div class="form-group col-sm-6 col-12">
            <label for="password_confirmation" class="{{ Route::is('users.create') ? 'required' : '' }}">Confirmação de senha </label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" {{ Route::is('users.create') ? 'required' : '' }}>
        </div>
    @endif
</div>

@push('scripts')
    <script src="{{ asset('js/components/changeVisibilityPassword.js') }}"></script>
    <script src="{{ asset('js/components/previewImage.js') }}"></script>
    <script>
        $(function() {
            $('.select2').select2();
        });

        $('select[value]').each(function () {
            $(this).val($(this).attr('value'));
        });

        $("#profile").change(function() {
            filePreview(this, '#profilePreview');
        });

        $('#cpf').mask('000.000.000-00');
        $('#identity').mask('00000-0');
        var behavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 0 0000-0000' : '(00) 0000-00009';
        },
            options = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(behavior.apply({}, arguments), options);
                }
            };

	    $('#phone').mask(behavior, options);
    </script>
    <script>
        
    </script>
@endpush
