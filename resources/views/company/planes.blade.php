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

@section('div_principal')
<div style="background-image: url('{{ asset('img/banners/'.$banner) }}');background-repeat: no-repeat;background-size: 100% 60px; height: 60px;margin-top: -16px;margin-bottom: 10px">
</div>
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
            <strong class="text-right col-lg-3 col-md-4 col-sm-4 col-xs-12">Titulo:</strong>
            <span class="col-lg-9 col-md-8 col-sm-8 col-xs-12 card-text">{{$planBuyed->Plan->name}}</span>
        </div>
        <div class="row arriba">
            <strong class="text-right col-lg-3 col-md-4 col-sm-4 col-xs-12">Duración:</strong>
            <span class="col-lg-9 col-md-8 col-sm-8 col-xs-12 card-text">{{$planBuyed->Plan->duration}}</span>
        </div>
        <div class="row arriba">
            <strong class="text-right col-lg-3 col-md-4 col-sm-4 col-xs-12">Costo:</strong>
            <span class="col-lg-9 col-md-8 col-sm-8 col-xs-12 card-text">{{$planBuyed->Plan->price}}</span>
        </div>
        <div class="row arriba">
            <strong class="text-right col-lg-3 col-md-4 col-sm-4 col-xs-12">Fecha Inicio:</strong>
            <span class="col-lg-9 col-md-8 col-sm-8 col-xs-12 card-text">{{$planBuyed->start_date}}</span>
        </div>
        <div class="row arriba">
            <strong class="text-right col-lg-3 col-md-4 col-sm-4 col-xs-12">Fecha Fin:</strong>
            <span class="col-lg-9 col-md-8 col-sm-8 col-xs-12 card-text">{{$planBuyed->end_date}}</span>
        </div>
        @if (session('msg'))
            <small class="form-text text-success">
                <span>{{ '* ' . session('msg') }}</span>
            </small>
        @endif
        <hr>

        <!-----------------------Cards inferiores Planes--------------------------->
        <div class="row">

            <!--------------------------------PLAN 1------------------------------------->
            @foreach ($planes as $plan)
            @if ($plan->name != 'Gratis')
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
                                <a href="{{ route('company plan buy', $plan->id) }}" class="btn btn-success ml-auto">Obtener</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
            <!--------------------FIN PLAN ------------------->
        </div>
        <!--------------------FIN DE CARDS INFERIORES PLANES----------------------->
    </div>
@endsection
