@extends('layouts.app')
@section('Menu')
	<a class="dropdown-item" href="#">Crear rutas</a>
	<a class="dropdown-item" href="#">Rutas creadas</a>
	<a class="dropdown-item" href="#">Configuraciones</a>
	<a class="dropdown-item" href="#">Mi perfil</a>
    <a class="dropdown-item" href="#">Cerrar Sesión</a>
@endsection

@section('Items_sidebar')
	<a class="bg-dark list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-start align-items-center">
  			<input id="search" type="text" placeholder="Buscar..." aria-label="Search">
        </div>
    </a>
    <a href="{{route('user home')}}" class="bg-dark list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-start align-items-center break-word">
            <span class="fa fa-calendar fa-fw mr-3"></span>
            <span class="menu-collapsed">Crear rutas</span>
        </div>
    </a>
    <a href="{{route('user routes')}}" class="bg-dark list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-start align-items-center break-word">
            <span class="fa fa-calendar fa-fw mr-3"></span>
            <span class="menu-collapsed">Rutas creadas</span>
        </div>
    </a>
    <a href="{{route('user config')}}" class="bg-dark list-group-item list-group-item-action ">
        <div class="d-flex w-100 justify-content-start  align-items-center break-word">
            <span class="fa fa-calendar fa-fw mr-3"></span>
            <span class="menu-collapsed ">Configuraciones</span>
        </div>
    </a>
@endsection 

@section('banner')
<img src="{{asset('img/fornite.png')}}" style="width: 100%">
@endsection

