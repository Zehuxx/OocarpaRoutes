@extends('layouts.company')


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
                <form id="form-img" name="form-img">
                    <div class="form-group">
                            <label for="banner">Banner:</label>
                            <input class="form-control-file" id="banner" type="file" name="banner" placeholder="png, jpg, ...">
                    </div>
                </form>
                <span class="border border-primary">
                    <img src="" class="card-img-top" width="100%" height="60px" id="imagenmuestra" alt="Cargar la imagen porfavor">
                </span>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" form="form-img" type="submit">
                <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" form="form-img" type="reset">
                <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                // Asignamos el atributo src a la tag de imagen
                $('#imagenmuestra').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // El listener va asignado al input
        $("#banner").change(function() {
            readURL(this);
        });
    </script>
@endsection
