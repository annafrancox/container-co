@extends('admin.layouts.auth')

@section('content')
    <p class="login-box-msg">Registre uma nova conta</p>
    <form method="POST" action="{{ route('register') }}">
    @csrf
        <div class="form-group mb-3">
            <input type="text" name="name" id="name" class="form-control" placeholder="Nome" value="{{ old('name') }}" required autofocus>
        </div>
        <div class="form-group mb-3">
            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}" required>
        </div>
        <div class="form-group mb-3">
            <input type="date" name="dateBirth" id="dateBirth" class="form-control" placeholder="Data de nascimento" value="{{ old('dateBirth') }}" required>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Senha" minlength="8" required>
            <div class="input-group-append">
                <span class="input-group-text" id="clickEye">
                    <i class="fas fa-eye-slash" id="eye"></i>
                </span>
            </div>
        </div>
        <div class="form-group mb-3">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmação de senha" minlength="8" required>
        </div>
        <button type="submit" style="background-color: #2E64E0" class="btn btn-dark btn-block mt-3 mb-3">Registrar-se</button>
    </form>
    <hr>
    <div class='text-center'>
        Já tem uma conta? <a href="{{ route('login') }}"><b>Faça login.</b></a>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/components/changeVisibilityPassword.js') }}"></script>
@endpush
