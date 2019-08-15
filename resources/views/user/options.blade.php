@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active">
        <a href="#">Opciones</a>
    </li> 
@endsection



@section('cards')
<div class="row">
    <div style="width: 500px; margin: 0 auto;">
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
                        <input type="password" class="form-control" disabled="disabled" name="password">
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
</div>
@endsection

@section('css_js_mapa')
<link href="{{ asset('css/table.css') }}" rel="stylesheet">
@endsection