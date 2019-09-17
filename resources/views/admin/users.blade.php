@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Users</a>
    </li>
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
        <i class="fa fa-user"></i>Usuarios
    </div>
    <div class="card-body" style="overflow-x: auto;">
        <table class="table table-responsive-sm table-sm table-condensed table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->user_img}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role["name"]}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-sm btn-outline-primary mr-2" href="#">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-success mr-2" href="#">
                                    <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <form method="post" style="display: contents;" action="#">
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
        {{ $users->links() }}
    </div>
</div>
@endsection

@section('css_js_mapa')
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
@endsection
