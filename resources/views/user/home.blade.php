@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active">
        <a href="#">Home</a>
    </li>
@endsection


@section('div_principal') 
<div style="background-image: url('{{ asset('img/banners/b2.jpg') }}'); height: 80px; margin-top: -24px">
</div>
<div id="mapid">
	<button id="locate-position" class="colordefault" style="display: none"><i class="eye fas fa-globe-americas fa-lg"></i></button>
	<button id="route-save" class="colordefault" style="display: none"><i class="eye fas fa-save fa-lg"></i></button>
</div>
@if(isset($route))
    <input type="text" style="display: none" value="{{json_encode($route->coordinates)}}" id="ruta">
@endif


@endsection

@section('modal')
<!-- Modal -->
 <div class="modal fade"  id="guardar" tabindex="-1" role="dialog" aria-labelledby="ModalGuardar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Guardar ruta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
        <form class="well form-horizontal" id="nueva_ruta" method="post" action="{{route('user store routes')}}">
        @csrf
                	<span>Nombre</span>
                	<input type="text" name="nombre" value="{{old("nombre")}}" id="nombre" class="form-control">
                <div class="modal-body row">
                    @if($errors->has('nombre'))
                        <div class="alert alert-danger" style="width: 100%">
                            <span>{{ $errors->first('nombre') }}</span>
                        </div>
                    @endif
                    <span>Tipo ruta</span>
                    <select name="slc_tipo" id="slc_tipo" class="form-control">
                            <option value="0">Seleccione tipo de ruta</option>
                        @foreach($routesType as $routeType)
                            <option value="{{$routeType->id}}" {{ old('slc_tipo') == $routeType->id ? 'selected' : ''  }}>{{$routeType->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('slc_tipo'))
                        <div class="alert alert-danger" style="width: 100%">
                            <span>{{ $errors->first('slc_tipo') }}</span>
                        </div>
                    @endif
                    <span>Descripción</span>
                    <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripción..." aria-label="With textarea">{{old('descripcion')}}</textarea>
                    @if($errors->has('descripcion'))
                        <div class="alert alert-danger" style="width: 100%;">
                           <span>{{ $errors->first('descripcion') }}</span>
                        </div>
                    @endif
                </div>
                <input type="hidden" name="waypoints" id="waypoints">
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
    <script src="{{asset('js/user/mapa.js') }}"></script>

    <!-- permite crear una ruta, solo se usa cuando se presiona el boton add en la vista rutas-->
    @if(isset($_GET["nr"]))
        <script type="text/javascript">
            mymap.on('click', onMapClick);
        </script>
    @endif
    @if($errors->count() > 0)
         <script type="text/javascript">
            $("#route-save").show();
            $("#guardar").modal("show");
        </script>
    @endif
    <script type="text/javascript">

        function enviar_form() {

                // 
                document.getElementById("waypoints").value = getpoints();
                // SUBMIT THE FORM
                    $("#nueva_ruta").submit();
                
                
            }

        @if(isset($route))
        var ruta = $("#ruta").val();
        DibujarRuta(jQuery.parseJSON(ruta));
        @endif
        
        $(document).ready(function (){
            // habilita el icono de geolocalizacion
            $("#locate-position").show();
            /*
            $.ajax({
                    url:"{{ route('user types routes') }}",
                    method:"POST",
                    data:{_token: '{{csrf_token()}}'},
                    success:function(result){
                        $values='<option value="">Seleccione tipo de ruta</option>';
                        for (var i = 0;i < result.length;i++) {
                            $values+='<option value=' + result[i]._id + '>' + result[i].name+ '</option>';
                        }
                        $("#slc_tipo").html($values);
                    }
                });
                setTimeout(function(){
                    $("#guardar").modal("show");
                }, 1000);*/ 
            // consulta los tipos de rutas los trae y luego abre la modal guardar ruta
            $("#route-save").on("click",function(){
                $("#guardar").modal("show");
            }); 
        });

    </script>


@endsection
