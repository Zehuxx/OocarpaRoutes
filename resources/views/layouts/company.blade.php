@extends('layouts.users')

@section('sidebar elements')
    <li class="nav-title">Bienvenido</li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('company home')}}">
            <i class="nav-icon icon-info"></i> Información</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('company location')}}">
            <i class="nav-icon icon-location-pin"></i> Ubicación</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('company plan')}}">
            <i class="nav-icon icon-wallet"></i> Plan</a>
    </li>
    <!--<li class="nav-item">
        <a class="nav-link" href="#">
            <i class="nav-icon fa fa-cog"></i> Configuraciones</a>
    </li>-->
@endsection

@section('route')
@endsection

@section('div_principal')

@endsection
