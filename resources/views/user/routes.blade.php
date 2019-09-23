@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active">
        <a href="#">Rutas</a>
    </li>
@endsection


@section('div_principal')
<div style="background-image: url('{{ asset('img/banners/'.$banner) }}'); height: 60px;margin-top: -16px;margin-bottom: 10px">
</div>
@endsection


@section('cards')

<table style="margin-bottom: 10px">
    <tr>
        <td style="text-align: left;">
            <a class="btn btn-primary btn-add" href="{{route('home', ['nr']) }}"></a>
        </td>
        <td >
            <form method="get">
                <input type="text" id="search" value="{{ isset($search) ? $search : ''}}" autofocus="" name="search" placeholder="Filtrar..." style="width: auto;">
                <input type="submit" style="display: none" />
            </form>
        </td>
    </tr>
</table>

<div class="card">
    <div class="card-header">
        <i class="fa fa-table"></i> Rutas y puntos de transporte
    </div>
    <div class="card-body" style="overflow-x: auto;">
        <table class="table table-responsive-sm table-sm table-condensed table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            @foreach($routes as $route)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$route->name}}</td>
                <td>{{$route->RouteType["name"]}}</td>
                <td>{{$route->description}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-sm btn-outline-primary mr-2" href="{{ route('user show route',$route->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-outline-success mr-2" href="{{ route('user edit route',$route->id) }}">
                                <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <form method="post" style="display: contents;" action="{{ route('user destroy route',$route->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"   class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash-o"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $routes->links() }}
    </div>
</div>
@endsection

@section('css_js_mapa')
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
@endsection
