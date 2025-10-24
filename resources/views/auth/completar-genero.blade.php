@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_header', 'Completa tu perfil')

@section('auth_body')
    <div class="alert alert-info">
        <i class="fas fa-info-circle"></i> Por favor selecciona tu género para continuar
    </div>

    <form action="{{ route('guardar.genero') }}" method="post">
        @csrf

        {{-- Name field (readonly) --}}
        <div class="input-group mb-3">
            <input type="text" class="form-control" 
                   value="{{ Auth::user()->name }}" readonly>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
        </div>

        {{-- Email field (readonly) --}}
        <div class="input-group mb-3">
            <input type="email" class="form-control" 
                   value="{{ Auth::user()->email }}" readonly>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
        </div>

        {{-- Gender field (required) --}}
        <div class="input-group mb-3">
            <select name="genero" class="form-control @error('genero') is-invalid @enderror" required>
                <option value="">Seleccione su género *</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
            </select>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-venus-mars {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('genero')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Submit button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-check"></span>
            Completar registro
        </button>
    </form>
@stop