@extends('layouts.app')
<style>
    .formulario{
        margin-top: 30% !important;
        background-color: rgba(127, 70, 0, 0.3)/*rgba(255, 228, 150, 0.65)*/ !important;
        border-radius: 10px !important;
    }

    strong{
        font-size: 12px;
    }

    .centrar{
        margin-left: 20%;
    }

    .btn-success{
        background-color: #016B1E;
    }

    .btn-success:hover{
        background-color: #038827;
    }

    .img-centrada{
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
</style>

@section('body')
    <!--<div  style="background-image: url({{asset('img/mapa.png')}});background-repeat: no-repeat;background-size: cover; height: 94vh; widht:100vw; opacity:0.85">-->
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5">
                <div class="card formulario">
                    <div class="card-body p-5">
                        <div>
                            <img src="{{asset('img/logo.png')}}" class="img-centrada" style="heigh:100px !important; width: 100px;">
                        </div>
                        <h2 class="text-muted">Inicia Sesión</h2>
                        <form method="POST" action="{{ route('login_p') }}">
                        @csrf

                        @error('general')
                            <div class="col-md-12">
                                <span class="invalid-feedback" style="display: block;margin-bottom: 10px;margin-left: 35%;" role="alert">
                                    <strong>
                                    {{$errors->first('general')}}
                                    </strong>
                                </span>
                            </div>
                        @enderror

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-at"></i></span>
                                </div>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="Contraseña">

                                <!--@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @enderror-->
                            </div>

                            <strong>¿Olvidaste tu contraseña?</strong>

                            <!--<div class="input-group mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recordarme') }}
                                        </label>
                                    </div>
                                </div>
                            </div>-->

                            <!--<button class="btn btn-block btn-success mt-4" type="button">Iniciar Sesión</button>-->
                            <button type="submit" class="btn btn-block btn-success mt-4">
                                    {{ __('Login') }}
                            </button>

                                <!--@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif-->
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="mr-auto ml-auto">
                                <strong>¿No tienes cuenta?<a href="#">Regístrate</a></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--</div>-->
@endsection