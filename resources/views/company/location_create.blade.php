@extends('layouts.company')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">
        <a href="{{route('company location')}}">Ubicación</a>
    </li>
    <li class="breadcrumb-item active">
            <a href="{{route('company add location')}}">Agregar Ubicacion</a>
    </li>
@endsection

@Section('cards')
<div class="row">
    <div class="col-md-6 align-self-center mr-auto ml-auto">
        <div class="card">
            <div class="card-header">
                <strong>Crear Ubicación</strong>
            </div>
            <div class="card-body">
                <form id="form-location" name="form-location"  method="POST" role="form" enctype="multipart/form-data"  action="{{ route('company create location') }}">
                    @csrf

                    <div class="form-group">
                            <label for="name">Nombre Ubicación o Sucursal</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="nombre">

                        @if($errors->has('name'))
                            <small class="form-text text-danger">
                                <span>{{ $errors->first('name') }}</span>
                            </small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="lat">Latitud</label>
                        <input class="form-control" id="lat" type="text" name="lat" placeholder="Debería rellenarse solo, al cargar la página">

                        @if($errors->has('lat'))
                        <small class="form-text text-danger">
                            <span>{{ $errors->first('lat') }}</span>
                        </small>
                    @endif
                    </div>

                    <div class="form-group">
                        <label for="lng">Longitud</label>
                        <input class="form-control" id="lng" type="text" name="lng" placeholder="Debería rellenarse solo, al cargar la página">

                        @if($errors->has('lng'))
                        <small class="form-text text-danger">
                            <span>{{ $errors->first('lng') }}</span>
                        </small>
                    @endif
                    </div>

                    <div class="form-group">
                        <label for="marker"></label>
                        <input id="marker" type="file" name="marker">

                        @if($errors->has('marker'))
                        <small class="form-text text-danger">
                            <span>{{ $errors->first('marker') }}</span>
                        </small>
                    @endif
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-success" form="form-location" type="submit">
                <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" form="form-location" type="reset">
                <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
    </div>
</div>
@endsection
