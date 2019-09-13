@extends('layouts.company')

<style>
    .margen{
        margin-left: auto !important;
        margin-right: auto !important;
    }

    .arriba{
        margin-top: 5px;
    }
</style>

@section('route')
    <li class="breadcrumb-item">Company</li>
    <li class="breadcrumb-item active">
        <a href="{{route('company plan')}}">Plan</a>
    </li>
@endsection

@section('cards')
    <div class="card card-accent-success col-lg-8 margen">
        <div class="card-header">
            <h3 class="card-title mb-0">Planes</h3>
        </div>

    <div class="card-body">
        <div class="row">
            <h4 class="card-title margen">Plan Actual</h4>
        </div>

        <div class="row arriba">
            <strong class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Titulo:</strong>
            <span class="col-lg-10 col-md-9 col-sm-9 col-xs-12 card-text">Lorem ipsum</span>
        </div>
        <div class="row arriba">
            <strong class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Duración:</strong>
            <span class="col-lg-10 col-md-9 col-sm-9 col-xs-12 card-text">Lorem ipsum dolor sit amet.</span>
        </div>
        <div class="row arriba">
            <strong class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Costo:</strong>
            <span class="col-lg-10 col-md-9 col-sm-9 col-xs-12 card-text">HNL XX.XX</span>
        </div>
        <div class="row arriba">
            <strong class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Fecha Inicio:</strong>
            <span class="col-lg-10 col-md-9 col-sm-9 col-xs-12 card-text">XX/XX/XXXX</span>
        </div>
        <div class="row arriba">
            <strong class="col-lg-2 col-md-3 col-sm-3 col-xs-12">Fecha Fin:</strong>
            <span class="col-lg-10 col-md-9 col-sm-9 col-xs-12 card-text">XX/XX/XXXX</span>
        </div>
        <hr>

        <!-----------------------Cards inferiores Planes--------------------------->
        <div class="row">

            <!--------------------------------PLAN 1------------------------------------->
            @foreach ($planes as $plan)

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                 <div class="card">
                    <!--<img src="..." class="card-img-top" alt="...">-->
                    <div class="card-body">
                    <strong class="card-title">{{$plan->name}}</strong>
                        <div class="row">
                            <span class="col-lg-4 col-md-6 col-xs-12 arriba" >Duración:</span>
                        <span class="col-lg-8 col-md-6 col-xs-12 arriba" > {{$plan->duration}}</span>
                        </div>
                        <div class="row">
                            <span class="col-lg-4 col-md-6 col-xs-12 arriba" >Costo:</span>
                        <span class="col-lg-8 col-md-6 col-xs-12 arriba" >{{$plan->price}}</span>
                        </div>
                        <div class="row">
                            <span class="col-lg-12 col-md-6 col-xs-12 arriba">Descripción:</span>
                        <span class="col-lg-12 col-md-12 col-xs-12" >{{$plan->description}}</span>
                        </div>
                        <div class="row">
                            <a href="#" class="btn btn-success ml-auto">Obtener</a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            <!--------------------FIN PLAN ------------------->

            <!--------------------------------PLAN 2------------------------------------->
            <!--<div class="col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <strong class="card-title">Plan Silver</strong>
                        <div class="row">
                            <span class="col-lg-4 col-md-6 col-xs-12 arriba" >Duración:</span>
                            <span class="col-lg-8 col-md-6 col-xs-12 arriba" > 6 Meses</span>
                        </div>
                        <div class="row">
                            <span class="col-lg-4 col-md-6 col-xs-12 arriba" >Costo:</span>
                            <span class="col-lg-8 col-md-6 col-xs-12 arriba" >HNL XX.XX</span>
                        </div>
                        <div class="row">
                            <span class="col-lg-12 col-md-6 col-xs-12 arriba" >Descripción:</span>
                            <span class="col-lg-12 col-md-12 col-xs-12" >Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum veniam modi odit non commodi rerum, quas ea accusamus ullam hic sed quaerat assumenda voluptas excepturi voluptates doloremque fugiat incidunt eos.</span>
                        </div>
                        <div class="row">
                            <a href="#" class="btn btn-primary ml-auto">Obtener</a>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-------------------------FIN PLAN 2------------------------>


            <!--------------------------------PLAN 3------------------------------------->
            <!--<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <strong class="card-title">Plan Gold</strong>
                        <div class="row">
                            <span class="col-lg-4 col-md-6 col-xs-12 arriba" >Duración:</span>
                            <span class="col-lg-8 col-md-6 col-xs-12 arriba" > 1 Año</span>
                        </div>
                        <div class="row">
                            <span class="col-lg-4 col-md-6 col-xs-12 arriba" >Costo:</span>
                            <span class="col-lg-8 col-md-6 col-xs-12 arriba" >HNL XX.XX</span>
                        </div>
                        <div class="row">
                            <span class="col-lg-12 col-md-6 col-xs-12 arriba" >Descripción:</span>
                            <span class="col-lg-12 col-md-12 col-xs-12" >Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum veniam modi odit non commodi rerum, quas ea accusamus ullam hic sed quaerat assumenda voluptas excepturi voluptates doloremque fugiat incidunt eos.</span>
                        </div>
                        <div class="row">
                            <a href="#" class="btn btn-primary ml-auto">Obtener</a>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-------------------------------FIN PLAN 3----------------------------------->

        </div>
        <!--------------------FIN DE CARDS INFERIORES PLANES----------------------->
    </div>
@endsection
