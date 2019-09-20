@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Home</a>
    </li>
@endsection


@section('div_principal')  
<div id="mapid">
  <button id="locate-position" class="colordefault" style="display: none"><i class="eye fas fa-globe-americas fa-lg"></i></button>
  <button id="route-save" class="colordefault" style="display: none"><i class="eye fas fa-save fa-lg"></i></button>
    <button id="route-edit" class="colordefault" style="display: none"><i class="eye fas fa-edit fa-lg"></i></button>
</div>
<!-- usada para visualizar rutas-->
@if(isset($route))
    <input type="text" style="display: none" value="{{json_encode($route->coordinates)}}" id="ruta">
@endif
<!-- usada para editar rutas-->
@if(isset($routeedit))
    <input type="text" style="display: none" value="{{json_encode($routeedit->coordinates)}}" name="rutaedit" id="rutaedit">
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
        <form class="well form-horizontal" id="nueva_ruta" method="post" action="{{route('admin store routes')}}">
        @csrf
                  <span>Nombre</span>
                  <input type="text" name="nombre" value="{{old("nombre")}}" id="nombre" class="form-control @error('nombre') is-invalid @enderror">
                  @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @enderror
                <div class="modal-body row">
                    
                    <span>Tipo ruta</span>
                    <select name="slc_tipo" id="slc_tipo" class="form-control @error('slc_tipo') is-invalid @enderror">
                            <option value="0">Seleccione tipo de ruta</option>
                        @foreach($routesType as $routeType)
                            <option value="{{$routeType->id}}" {{ old('slc_tipo') == $routeType->id ? 'selected' : ''  }}>{{$routeType->name}}</option>
                        @endforeach
                    </select>
                    @error('slc_tipo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('slc_tipo') }}</strong>
                        </span>
                    @enderror
                    <span>Descripción</span> 
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" placeholder="Descripción..." aria-label="With textarea">{{old('descripcion')}}</textarea>
                    @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('descripcion') }}</strong>
                        </span>
                    @enderror
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
    @if(isset($routeedit))
    <!-- Modal -->
 <div class="modal fade"  id="editar" tabindex="-1" role="dialog" aria-labelledby="ModalGuardar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Editar ruta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
        <form class="well form-horizontal" id="editar_ruta" method="post" action="{{route('admin update route',$routeedit->id)}}">
        @csrf
        @method('PUT') 
                    <span>Nombre</span>
                    <input type="text" name="nombre" value="{{$routeedit->name}}" id="nombre" class="form-control @error('nombre') is-invalid @enderror">
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @enderror
                <div class="modal-body row">
                    <span>Tipo ruta</span>
                    <select name="slc_tipo" id="slc_tipo" class="form-control @error('slc_tipo') is-invalid @enderror">
                            <option value="0">Seleccione tipo de ruta</option>
                        @foreach($routesType as $routeType)
                            <option value="{{$routeType->id}}" {{ $routeedit->route_type_id == $routeType->id ? 'selected' : ''  }}>{{$routeType->name}}</option>
                        @endforeach
                    </select>
                    @error('slc_tipo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('slc_tipo') }}</strong>
                        </span>
                    @enderror
                    <span>Descripción</span>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" placeholder="Descripción..." aria-label="With textarea">{{$routeedit->description}}</textarea>
                    @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('descripcion') }}</strong>
                        </span>
                    @enderror
                </div>
                <input type="hidden" name="waypointsedit" id="waypointsedit">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="enviar_form2()" class="btn btn-primary">Guardar</button>
            </div>
        </form>
            </div>
        </div>
    </div>

    @endif
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
           
            @if($errors->count() > 0)
                RedibujarRuta({{old("waypoints")}});
            @else
                 mymap.on('click', onMapClick);
            @endif
        </script>
       
    @endif
    
    <script type="text/javascript">
        //consigue los waypoints y luego manda los datos del formulario guardar para crear una nueva ruta
        function enviar_form() {
            document.getElementById("waypoints").value = getpoints(route);
                $("#nueva_ruta").submit();    
        }
        //consigue los waypoints y luego manda los datos del formulario editar para editar una ruta
        function enviar_form2() {
            document.getElementById("waypointsedit").value = getpoints(route_edit);
                $("#editar_ruta").submit();    
        }
        //verifica si se quiere visualizar una ruta
        //si es asi la dibuja
        @if(isset($route))
            var ruta = $("#ruta").val();
            DibujarRuta(jQuery.parseJSON(ruta));
            @if($errors->count() > 0)
                $("#route-save").show();
                $("#guardar").modal("show");
            @endif
        @endif 

        //verifica si se quiere dibujar una ruta para luego ser editada
        @if(isset($routeedit))
            var ruta = $("#rutaedit").val();
            $("#route-edit").show();
            @if($errors->count() > 0)
                EditarRuta({{old("waypointsedit")}});
                $("#route-save").show();
                $("#editar").modal("show");
            @else
                EditarRuta(jQuery.parseJSON(ruta));
            @endif
        @endif

        $(document).ready(function (){
            // habilita el icono de geolocalizacion
            $("#locate-position").show();
            
            //  abre la modal guardar ruta
            $("#route-save").on("click",function(){
                $("#guardar").modal("show");
            });
            //  abre la modal editar ruta
            $("#route-edit").on("click",function(){
                $("#editar").modal("show");
            });
        });

    </script>


@endsection
