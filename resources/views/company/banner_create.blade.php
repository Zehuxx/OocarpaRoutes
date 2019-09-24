@extends('layouts.company')


@section('route')
    <li class="breadcrumb-item">Company</li>
    <li class="breadcrumb-item active">
        <a href="#">Banner</a>
    </li>
    <li class="breadcrumb-item">Nuevo</li>
@endsection

@section('div_principal')
<div style="background-image: url('{{ asset('img/banners/'.$banner) }}');background-repeat: no-repeat;background-size: 100% 60px; height: 60px;margin-top: -16px;margin-bottom: 10px">
</div>
@endsection

@section('cards')

<div class="row">
    <div class="col-md-6 mx-auto my-5">
        <div class="card">
            <div class="card-header">
                <strong>Cargar banner</strong>
            </div>
            <div class="card-body">
                <form id="form-img" name="form-img"  method="POST" role="form" enctype="multipart/form-data"  action="{{ route('company banner store') }}">
                    @csrf

                    <div class="form-group">
                            <label for="banner">Banner:</label>
                            <input class="form-control-file" id="banner" type="file" name="banner" placeholder="png, jpg, ...">
                    </div>
                    @if($errors->has('banner'))
                        <div class="alert alert-danger">
                            <span>{{ $errors->first('banner') }}</span>
                        </div>
                    @endif
                </form>
                <span class="border border-primary">
                    <img src="" class="card-img-top" width="100%" height="60px" id="imagenmuestra" alt="Cargar la imagen porfavor">
                </span>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" form="form-img" type="submit">
                <i class="fa fa-save"></i> Guardar</button>
                <button class="btn btn-sm btn-danger" form="form-img" type="reset">
                <i class="fa fa-ban"></i> Cancelar</button>
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
