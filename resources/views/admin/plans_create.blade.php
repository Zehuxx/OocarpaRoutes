@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">
        <a href="{{route('plans')}}">Planes</a>
    </li>
    <li class="breadcrumb-item active">
            <a href="{{route('add plan')}}">Planes</a>
    </li>
@endsection

@Section('cards')
<div class="row">
    <div class="col-md-6 align-self-center mr-auto ml-auto">
        <div class="card">
            <div class="card-header">
                <strong>Crear Plan</strong>
            </div>
            <div class="card-body">
                <form id="form-plan" name="form-plan"  method="POST" role="form" enctype="multipart/form-data"  action="{{ route('create plan') }}">
                    @csrf

                    <div class="form-group">
                            <label for="name">Nombre Plan</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="nombre">

                        @if($errors->has('name'))
                            <small class="form-text text-danger">
                                <span>{{ $errors->first('name') }}</span>
                            </small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input class="form-control" id="description" type="text" name="description" placeholder="descripción">

                        @if($errors->has('description'))
                        <small class="form-text text-danger">
                            <span>{{ $errors->first('description') }}</span>
                        </small>
                    @endif
                    </div>

                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input class="form-control" id="price" type="text" name="price" placeholder="Precio: Lps. XX.XX">

                        @if($errors->has('price'))
                        <small class="form-text text-danger">
                            <span>{{ $errors->first('price') }}</span>
                        </small>
                    @endif
                    </div>

                    <div class="form-group">
                        <label for="duration">Duración</label>
                        <input class="form-control" id="duration" type="text" name="duration" placeholder="duración">

                        @if($errors->has('duration'))
                        <small class="form-text text-danger">
                            <span>{{ $errors->first('duration') }}</span>
                        </small>
                    @endif
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-success" form="form-plan" type="submit">
                <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" form="form-plan" type="reset">
                <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
    </div>
</div>
@endsection
