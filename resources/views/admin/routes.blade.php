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
            <!--<a class="btn btn-success btn-add" href=""><i class="fa fa-plus"></i></a>-->
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
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <!--<th>Verificada</th>-->
                    <th>Pública</th>
                    <th>Acciones</th>
                </tr>
            </thead>
                <!--INFO DE LAS RUTAS-->
            <tbody>
                @foreach($routes as $route)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$route->name}}</td>
                        <td>{{$route->RouteType['name']}}</td>
                        <td>{{$route->ispublic ? 'true' : 'false'}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-sm btn-outline-primary mr-2" href="#">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-outline-success mr-2" href="#">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <form action="{{route('destroy route', $route->id)}}" method="post">
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
