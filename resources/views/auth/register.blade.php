@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center form-wrap">
        <div class="col-md-8 form-cols">
            <div class="card border-info">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="paterno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>

                            <div class="col-md-6">
                                <input id="paterno" type="text" class="form-control  {{ $errors->has('paterno') ? ' is-invalid' : '' }}" name="paterno" value="{{ old('paterno') }}" required>

                                @if ($errors->has('paterno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('paterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="materno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>

                            <div class="col-md-6">
                                <input id="materno" type="text" class="form-control{{ $errors->has('materno') ? ' is-invalid' : '' }}" name="materno" value="{{ old('materno') }}">

                                @if ($errors->has('materno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('materno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

                           <!-- <div class="col-md-6">
                                 <label class="radio-inline"><input type="radio" name="sexo" id="femenino" value="F" required>Femenino</label>
                                <label class="radio-inline"><input type="radio" name="sexo" id="masculino" value="M">Masculino</label>
                            </div>
                        </div> -->
                        <div class="col-md-6">

                        <div class="custom-control custom-radio ">
                          <input type="radio" id="femenino" name="sexo" class="custom-control-input" value="F">
                          <label class="custom-control-label" for="femenino">Femenino</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="masculino" name="sexo" class="custom-control-input" value="M">
                          <label class="custom-control-label" for="masculino">Masculino</label>
                        </div>
                        </div>
                    </div>
                        
                        <div class="form-group row">
                            <label for="nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Nacimiento') }}</label>

                            <div class="col-md-6">

                                <input type="date" class="form-control " id="nacimiento" name="nacimiento" max="2001-01-01"
                                   value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="usuario" type="text" class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}" name="usuario" value="{{ old('usuario') }}" required pattern="[A-Za-z0-9]{5,50}" title="Letras y números. Tamaño mínimo: 5. Tamaño máximo: 50" required autofocus>

                                @if ($errors->has('usuario'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('usuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <a class="btn btn-danger" href="/">
                                    {{ __('Cancelar') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
