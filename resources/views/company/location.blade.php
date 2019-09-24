@extends('layouts.company')

@section('route')
    <li class="breadcrumb-item">Company</li>
    <li class="breadcrumb-item active">
        <a href="#">Ubicación</a>
    </li>
@endsection

@section('div_principal')
<div style="background-image: url('{{ asset('img/banners/'.$banner) }}');background-repeat: no-repeat;background-size: 100% 60px; height: 60px;margin-top: -16px;margin-bottom: 10px">
</div>
    <!-- usada para visualizar rutas-->
    @if(isset($marker))
        <input type="text" style="display: none" value="{{json_encode($marker->coordinates)}}" id="marcador">
    @endif
    <div id="mapid">
        <button id="locate-position" class="colordefault" style="display: none"><i class="eye fas fa-globe-americas fa-lg"></i></button>
        <button id="route-save" class="colordefault" style="display: none"><i class="eye fas fa-save fa-lg"></i></button>
    </div>

@endsection


{{--@section('menu-contextual')

@endsection--}}
@section('modal')
 <!-- Modal -->
 <div class="modal fade"  id="guardar-sucursal" tabindex="-1" role="dialog" aria-labelledby="ModalEditar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Agregar sucursal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-location" name="form-location"  method="POST" role="form" enctype="multipart/form-data"  action="{{ route('company store location') }}">
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
                        <label for="marker"></label>
                        <input id="marker" type="file" name="marker">

                        @if($errors->has('marker'))
                        <small class="form-text text-danger">
                            <span>{{ $errors->first('marker') }}</span>
                        </small>
                    @endif
                    </div>
                    <input type="hidden" name="waypoints" value="{{old("waypoints")}}" id="waypoints">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="enviar_form()" class="btn btn-primary">Guardar</button>
            </div>
            </form>
            </div>
        </div>
    </div>
    <!--FIN Modal-->

@endsection

@section('js_mapa')
    <!-- Mapa -->
    <script src="{{ asset('js/leaflet.contextmenu.js') }}"></script>
    <script> var base_url = "{{asset('img')}}"; </script> <!-- variable para iconos del mapa juan* -->
    <script src="{{asset('js/leaflet-number-icon.js')}}"></script>
    <script src="{{ asset('js/company/mapa.js') }}"></script>

    <script type="text/javascript">
        //consigue los waypoints y luego manda los datos del formulario guardar
        function enviar_form() {
            document.getElementById("waypoints").value = getpoints();
            $("#form-location").submit();
        }

        @if(isset($locations))
            var locations='<?php echo $locations;?>';
            var empresa='<?php
            $empresa=array();
                for ($i=0; $i < count($locations); $i++) {
                    $empresa[]=$locations[$i]->Company;
                }
                echo implode('#|#',$empresa);
            ?>';
            locations=JSON.parse(locations);
            empresa=empresa.split('#|#');
            DibujarMarcadores(locations,empresa);
        @endif

        @if($errors->count() > 0)
            @if($errors->has('Plan'))
                alert("{{$errors->first('Plan')}}");
            @else
                DibujarMarcador({{old("waypoints")}});
                $("#route-save").show();
                $("#guardar-sucursal").modal("show");
            @endif

        @endif
    </script>
@endsection
