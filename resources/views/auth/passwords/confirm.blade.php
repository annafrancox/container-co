@extends('admin.layouts.sistema')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-dark">
                <div class="card-header">Confirmação de senha</div>
                <div class="card-body">
                    Por favor, confirme sua senha para continuar:
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="input-group mt-3 mb-3">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="clickEye">
                                    <i class="fas fa-eye-slash" id="eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Confirmar Senha
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Esqueceu sua senha?
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/components/changeVisibilityPassword.js') }}"></script>
@endpush
