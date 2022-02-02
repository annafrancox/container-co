@extends('admin.layouts.auth')

@section('content')
    <p class="login-box-msg">Modificar senha</p>
    <form method="POST" action="{{ route('password.update') }}">
    @csrf
        <div class="form-group mb-3">
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" value="{{ $email ?? old('email') }}" required autofocus>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>
            <div class="input-group-append">
                <span class="input-group-text" id="clickEye">
                    <i class="fas fa-eye-slash" id="eye"></i>
                </span>
            </div>
        </div>
        <div class="form-group mb-3">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmação de senha" required>
        </div>
        <button type="submit" class="btn btn-dark btn-block mt-3 mb-3">Modificar Senha</button>
    </form>
@endsection
@push('scripts')
    <script src="{{ asset('js/components/changeVisibilityPassword.js') }}"></script>
@endpush


