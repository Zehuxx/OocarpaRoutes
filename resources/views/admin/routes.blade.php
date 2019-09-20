@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Home/Routes</a>
    </li>
@endsection

@section('cards')

<table style="margin-bottom: 10px">
    <tr>
        <td style="text-align: left;"> 
            <a class="btn btn-primary btn-add" href="{{route('home', ['nr'])}}"></a>
        </td>
        <td>
            <form method="get">
                <input type="text" id="search" value="{{ isset($search) ? $search : ''}}" autofocus="" name="search" placeholder="Filtrar..." style="width: auto;">
                <input type="submit" style="display: none" />
            </form>
        </td>
    </tr>
</table>

<div class="card">
    <div class="card-header">
        <i class="fa fa-table"></i>Rutas
    </div>
    <div class="card-body" style="overflow-x: auto;">
        <table class="table table-responsive-sm table-sm table-condensed table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Pública</th>
                    <th>Acciones</th>
                </tr>
            </thead>
                <!--INFO DE LAS RUTAS-->
            <tbody>
                @foreach($routes as $route)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$route->User['name'].' '.$route->User['last_name']}}</td>
                        <td>{{$route->name}}</td>
                        <td style="width: 15%; text-align: left;">{{$route->description}}</td>
                        <td>{{$route->RouteType['name']}}</td>
                        <td>{{$route->is_public ? 'true' : 'false'}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-sm btn-outline-primary mr-2" href="{{ route('admin show route',$route->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-outline-success mr-2" href="{{ route('admin edit route',$route->id) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <form action="{{route('admin destroy route', $route->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <!--FIN INFO RUTAS-->
            </tbody>
        </table>
        {{ $routes->links() }}
    </div>
</div>
@endsection

@section('css_js_mapa')
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
@endsection
