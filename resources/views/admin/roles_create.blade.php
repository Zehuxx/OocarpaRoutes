@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">
        <a href="{{route('roles') }}">Roles</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{route('add role') }}">Crear rol</a>
    </li>
@endsection

@Section('cards')
<div class="row">
    <div class="col-md-6 align-self-center mr-auto ml-auto">
        <div class="card">
            <div class="card-header">
                <strong>Crear Rol</strong>
            </div>
            <div class="card-body">
                <form id="form-plan" name="form-plan"  method="POST" role="form" enctype="multipart/form-data"  action="{{ route('create role') }}">
                    @csrf

                    <div class="form-group">
                            <label for="name">Nombre Rol</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="nombre">

                        @if($errors->has('name'))
                            <small class="form-text text-danger">
                                <span>{{ $errors->first('name') }}</span>
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
