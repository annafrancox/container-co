@extends('admin.layouts.auth')

@section('content')
    <p class="login-box-msg">Entre em sua conta</p>
    <form method="POST" action="{{ route('login') }}">
    @csrf
        <div class="form-group mb-3">
            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>
            <div class="input-group-append">
                <span class="input-group-text" id="clickEye">
                    <i class="fas fa-eye-slash" id="eye"></i>
                </span>
            </div>
        </div>
        <button type="submit" style="background-color: #B7410E; border-color: #B7410E; " class="btn btn-primary btn-block mt-3 mb-3">Entrar</button>
    </form>
    <hr>
    <div class='text-center'>
        Ainda não tem uma conta? <a style="color: #B7410E;" href="{{ route('register') }}"><b>Cadastre-se.</b></a>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/components/changeVisibilityPassword.js') }}"></script>
@endpush
