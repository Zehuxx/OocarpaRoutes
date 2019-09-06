@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
    <a href="{{route('roles')}}">Roles</a>
    </li>
@endsection


@section('cards')
<div class="row">
    <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12">
        <table style="margin-bottom: 10px">
            <tr>
                <td style="text-align: left;">
                    <a class="btn btn-success btn-add" href="{{route('add role') }}"><i class="fa fa-plus"></i></a>
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
                <i class="fa fa-table"></i>Roles
            </div>
            <div class="card-body" style="overflow-x: auto;">
                <table class="table  table-striped table-hover">
                <tbody>
                    <tr>
                        <th></th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{$loop->iteration}}</<td>
                        <td>{{$role->name}}</td>
                        <td>
                        <!--<a class="btn-see btn btn-primary" href=""><i class="fa fa-eye"></i></a>-->
                        <a class="btn-edit btn btn-success" href=""><i class="fa fa-pencil"></i></a>

                        <form action="{{route('destroy role', $role->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                            <!--<input name="_method" type="hidden" value="DELETE">-->
                            <button type="submit" class="btn-delete btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
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
