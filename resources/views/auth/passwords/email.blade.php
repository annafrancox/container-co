@extends('admin.layouts.auth')

@section('content')
    <p class="login-box-msg">Modificar senha</p>
    <form method="POST" action="{{ route('password.email') }}">
    @csrf
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-group mb-3">
            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}" required autofocus>
        </div>
        <button type="submit" class="btn btn-dark btn-block mt-3 mb-3">Enviar link para redefinir senha</button>
    </form>
    <hr>
    <div class='text-center'>
        Lembrou sua senha? <a href="{{ route('login') }}"><b>Faça login.</b></a>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/components/changeVisibilityPassword.js') }}"></script>
@endpush

