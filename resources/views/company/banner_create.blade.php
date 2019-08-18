@extends('layouts.company')

@section('css_js_mapa')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@endsection

@section('route')
    <li class="breadcrumb-item">Company</li>
    <li class="breadcrumb-item active">
        <a href="#">Banner</a>
    </li>
    <li class="breadcrumb-item">Nuevo</li>
    <li class="breadcrumb-menu d-md-down-none">
        <div class="btn-group" role="group" aria-label="Button group">
            <a class="btn" href="#">
                <i class="icon-plus"></i>
            </a>
        </div>
    </li>
@endsection

@section('cards')

<div class="row">
    <div class="col-md-6 align-self-center">
        <div class="card">
            <div class="card-header">
                <strong>Cargar banner</strong>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                            <label for="nf-email">Email</label>
                            <input class="form-control" id="nf-email" type="email" name="nf-email" placeholder="Enter Email..">
                            <span class="help-block">Please enter your email</span>
                    </div>
                    <div action="/file-upload" class="dropzone" id="my-awesome-dropzone">

                    </div>
                </form>

            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" form="form-img" type="submit">
                <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" type="reset">
                <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
@endsection
