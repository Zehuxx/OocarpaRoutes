@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active">
        <a href="#">Opciones</a>
    </li>
@endsection

@section('div_principal')
<div style="background-image: url('{{ asset('img/banners/b2.jpg') }}'); height: 60px;margin-top: -16px;margin-bottom: 10px">
</div>
@endsection

@section('cards')
<div class="col-md-6 mx-auto my-5">
    <div class="card">
        <div class="card-header">
            <h5>Inicio de sesión</h5>
        </div>
        <div class="card-body">
                <legend style="font-size: 1.1rem">Correo</legend>
                <div class="input-group">
                    <input type="email" class="form-control" disabled="disabled" name="correo">
                </div>
                <legend style="font-size: 1.1rem;margin-top: 5px;">Contraseña</legend>
                <form class="well form-horizontal" method="post" action="#">
                @csrf
                @method('PUT')
                <div class="input-group">
                    <input type="password" class="form-control" value="qwerty12" disabled="disabled" name="password">
                    <span class="input-group-append">
                        <button class="btn btn-primary" type="submit">Actualizar</button>
                    </span>
                </div>
                </form>
                <legend style="font-size: 1.1rem;margin-top: 5px;">Foto de perfil</legend>
                <form class="well form-horizontal" method="POST" role="form" enctype="multipart/form-data"  action="#">
                    @csrf
                    @method('PUT')
                <div class="input-group">
                    <input name="image" class="form-control"  type="file" >
                    <span class="input-group-append">
                        <button class="btn btn-primary" type="submit">Actualizar</button>
                    </span>
                </div>
                </form>
        </div>
    </div>
</div>
@endsection

@section('css_js_mapa')
<link href="{{ asset('css/table.css') }}" rel="stylesheet">
@endsection
