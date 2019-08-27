@extends('layouts.users')

@section('sidebar elements')
    <li class="nav-title">Welcome</li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
            <i class="nav-icon icon-home"></i> Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="nav-icon icon-map"></i> Rutas</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{route('users')}}">
            <i class="nav-icon icon-people"></i> Usuarios</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#">
            <i class="nav-icon icon-directions"></i> Compañias</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin plans') }}">
            <i class="nav-icon icon-wallet"></i> Planes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('roles')}}">
            <i class="nav-icon icon-user"></i>Roles</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="typography.html">
            <i class="nav-icon icon-menu"></i> Opciones</a>
    </li>
@endsection

@section('route')
@endsection

@section('div_principal')
@endsection
