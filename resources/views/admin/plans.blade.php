
@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Planes</a>
    </li>
@endsection

@section('cards')
<table style="margin-bottom: 10px">
    <tr>
        <td style="text-align: left;">
            <a class="btn btn-primary btn-add" href="{{route('add plan') }}"></a>
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
        <i class="fa fa-table"></i>Planes
    </div>
    <div class="card-body" style="overflow-x: auto;">
        <table class="table table-responsive-sm table-sm table-condensed table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>precio</th>
                    <th>duración</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plans as $plan)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$plan->name}}</td>
                    <td>{{str_limit($plan->description, 70)}}</td>
                    <td>{{$plan->price}}</td>
                    <td>{{$plan->duration}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-sm btn-outline-info mr-2" href="#">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-success mr-2" href="#">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <form action="{{route('destroy plan', $plan->id)}}" method="post">
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
    </div>
</div>
@endsection

@section('css_js_mapa')
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
@endsection
