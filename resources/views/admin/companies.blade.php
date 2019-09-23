@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Empresas</a>
    </li>
@endsection

@Section('cards')
<table style="margin-bottom: 10px">
    <tr>
        <td style="text-align: left;">
            <a class="btn btn-success btn-add" href="#"></i></a>
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
        <i class="fa fa-table"></i>Empresas
    </div>
    <div class="card-body" style="overflow-x: auto;">
        <table class="table table-responsive-sm table-sm table-condensed table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$company->name}}</td>
                    <td>@if(count($company->usuario) > 0)
                            {{$company->usuario[0]->email}}
                        @else
                            No email
                        @endif
                    </td>
                    <td>{{str_limit($company->address, 20)}}</td>
                    <td>{{$company->phone}}</td>
                    <td>{{str_limit($company->description, 20)}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-sm btn-outline-primary mr-2" href="#">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-success mr-2" href="">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <form action="{{route('destroy company', $company->id)}}" method="post">
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
            </tbody>
        </table>
        {{ $companies->links() }}
    </div>
</div>
@endsection


@section('css_js_mapa')
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
@endsection
