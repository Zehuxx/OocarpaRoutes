@extends('layouts.company')

<style>
    .logo{
        width: auto;
        height: 50px;
    }

    .margen{
        margin-left: auto;
        margin-right: auto;
    }

    .centrado-vertical{
        margin-top: auto;
        margin-bottom: auto;
    }

    .arriba{
        margin-top: 10px;
    }

</style>


@section('route')
    <li class="breadcrumb-item">Company</li>
    <li class="breadcrumb-item active">
        <a href="#">Info</a>
    </li>
@endsection

@section('div_principal')
<div style="background-image: url('{{ asset('img/banners/'.$banner) }}'); height: 60px;margin-top: -16px;margin-bottom: 10px">
</div>
@endsection

@section('cards')
<div class="card col-lg-8 card-accent-warning margen">
    <div class="card-header">
        <h3 class="card-title mb-0">Sucursales</h3>
    </div>
    <div class="card-body" style="overflow-x: auto;">
        <table class="table table-responsive-sm table-sm table-condensed table-striped table-hover" style="text-align: center;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            @foreach($locations as $location)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$location->name}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <form method="post" style="display: contents;" action="{{route('company delete location',$location->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"   class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $locations->links() }}



    </div>
</div>
    <div class="card card-accent-primary col-lg-8 margen">

        <div class="card-header">
        <h3 class="card-title mb-0">Información Pública</h3>
        </div>

        <div class="card-body">
            <div class="row">
            <!-- /.col-->
                <div class="col-lg-3 col-md-2 col-sm-6 col-xs-12 margen">
                        <img src="{{ asset('img/brand/bat.png')}}" alt="Logo Empresa" class="logo">
                </div>

                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                    <h4 class="card-title centrado-vertical">{{$company->name}}</h4>
                </div>
            </div>
            <div class="row arriba">
                <strong class="col-lg-4 col-md-4 col-sm-3 col-xs-12">Descripción:</strong>
                <span class="col-lg-8 col-md-8 col-sm-9 col-xs-12 card-text">{{$company->description}}</span>
            </div>
            <div class="row arriba">
                <strong class="col-lg-4 col-md-4 col-sm-3 col-xs-12">Encargado:</strong>
                <span class="col-lg-8 col-md-8 col-sm-9 col-xs-12 card-text">{{Auth::user()->name.' '.Auth::user()->last_name}}</span>
            </div>
            <div class="row arriba">
                <strong class="col-lg-4 col-md-4 col-sm-3 col-xs-12">Telefono:</strong>
                <span class="col-lg-8 col-md-8 col-sm-9 col-xs-12 card-text">{{$company->phone}}</span>
            </div>
            <div class="row arriba">
                <button class="btn btn-primary ml-auto">Editar</button>
            </div>
        </div>
    </div>
    <!-----------------------FIN INFO PUBLICA----------------------->

    <!------------------------INICIO INFO PRIVADA------------------------------>
    <div class="card card-accent-success col-lg-8 margen">
        <div class="card-header">
            <h3 class="card-title mb-0">Información Privada</h3>
        </div>

        <div class="card-body">
            <div class="row">
               <span class="col-lg-3 col-md-3 col-sm-10 col-xs-10 ml-auto arriba">Correo Electrónico</span>
               <span class="col-lg-4 col-md-6 col-sm-10 col-xs-10 form-control mr-auto arriba">{{Auth::user()->email}}</span>
            </div>

            <!--<div class="row">
                <span class="col-lg-3 col-md-3 col-sm-10 col-xs-10 ml-auto arriba">Contraseña</span>
                <span class="col-lg-4 col-md-6 col-sm-10 col-xs-10 form-control mr-auto arriba">**********</span>
            </div>-->

            <div class="row">
                <button class="btn btn-primary ml-auto">Editar</button>
            </div>
       </div>
    </div>

@endsection
