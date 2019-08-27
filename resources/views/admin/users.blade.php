@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Users</a>
    </li>
@endsection


@section('cards')
<div class="row">
    <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12">
        <table style="margin-bottom: 10px">
            <tr>
                <td style="text-align: left;">
                    <a class="btn btn-primary btn-add" href="{{route('home', ['nr']) }}"><i class="fa fa-plus"></i></a>
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
                <i class="fa fa-table"></i>Users
            </div>
            <div class="card-body" style="overflow-x: auto;">
                <table class="table  table-striped table-hover">
                <tbody>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->user_img}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role["name"]}}</td>
                        <td>
                        <a class="btn-see btn btn-primary" href=""><i class="fa fa-eye"></i></a>
                        <a class="btn-edit btn btn-success" href=""><i class="fa fa-pencil"></i></a>

                            <button type="submit"   class="btn-delete btn btn-danger"><i class="fa fa-trash"></i></ button>
                        </td>
                    </tr>
                    @endforeach
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
