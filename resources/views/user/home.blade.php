@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active">
        <a href="#">Home</a>
    </li>
@endsection

@section('div_principal')
<div>
<h1>hola mundo desde h1</h1>
</div>
<div id="mapid">
	<button id="locate-position" class="colordefault" style="display: none"><i class="eye fas fa-globe-americas fa-lg"></i></button>
	<button id="route-save" class="colordefault" style="display: none"><i class="eye fas fa-save fa-lg"></i></button>
</div>

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
                	<span>Nombre</span>
                	<input type="text" name="nombre" id="nombre" class="form-control">
                <div class="modal-body row">
                    <span>Descripción</span>
                    <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripción..." aria-label="With textarea"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
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
@endsection
