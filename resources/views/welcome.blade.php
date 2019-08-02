@extends('layouts.app')

@section('body class', 'footer-fixed')

@section('navbar')
    <ul class="nav navbar-nav ml-auto"> {{-- no borra: d-md-down-none--}}
        <li class="nav-item px-3">
        <a class="nav-link" href="{{ route('admin home') }}">Administrador</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('admin home') }}">Compañia</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('user home') }}">Usuarios</a>
        </li>
    </ul>
@endsection

@section('body')
    <div class="main">
        <div class="container-fluid">
            <div class="animated fadeIn">
                <!-- /.card-->
                <div class="card">
                    Esta prodira ser la seccón del mapa
                </div>
            </div>
        </div>
    </div>
@endsection