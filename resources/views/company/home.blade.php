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

@section('cards')
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
                    <h4 class="card-title centrado-vertical">Nombre Empresa</h4>
                </div>
            </div>
            <div class="row arriba">
                <strong class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Descripción:</strong>
                <span class="col-lg-10 col-md-9 col-sm-9 col-xs-12 card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum accusamus magni provident, praesentium dolore, perferendis autem in, quidem adipisci consectetur culpa quasi velit sequi quia quod libero ullam dolorem? Incidunt laboriosam magnam nisi earum nobis.</span>
            </div>
            <div class="row arriba">
                <strong class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Encargado:</strong>
                <span class="col-lg-10 col-md-9 col-sm-9 col-xs-12 card-text">Lorem ipsum dolor</span>
            </div>
            <div class="row arriba">
                <strong class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Telefono:</strong>
                <span class="col-lg-10 col-md-9 col-sm-9 col-xs-12 card-text">+504 XXXX-XXXX</span>
            </div>
            <div class="row arriba">
                <strong class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Ubicaciones:</strong>
                <span class="col-lg-10 col-md-9 col-sm-9 col-xs-12 card-text">XXXX-XXXX</span>
                <span class="col-lg-2 col-md-3 col-sm-3 col-xs-12"></span>
                <span class="col-lg-10 col-md-9 col-sm-9 col-xs-12 card-text">YYYY-YYYY</span>
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
                <span class="col-lg-3 col-md-3 col-sm-10 col-xs-10 ml-auto">Nombre de Usuario</span>
                <span class="col-lg-4 col-md-6 col-sm-10 col-xs-10 form-control mr-auto">Username</span>
            </div>

            <div class="row">
               <span class="col-lg-3 col-md-3 col-sm-10 col-xs-10 ml-auto arriba">Correo Electrónico</span>
               <span class="col-lg-4 col-md-6 col-sm-10 col-xs-10 form-control mr-auto arriba">correo@dominio.com</span>
            </div>

            <div class="row">
                <span class="col-lg-3 col-md-3 col-sm-10 col-xs-10 ml-auto arriba">Contraseña</span>
                <span class="col-lg-4 col-md-6 col-sm-10 col-xs-10 form-control mr-auto arriba">**********</span>
            </div>

            <div class="row">
                <button class="btn btn-primary ml-auto">Editar</button>
            </div>
       </div>
    </div>

@endsection
