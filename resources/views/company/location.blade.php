@extends('layouts.company')

@section('route')
    <li class="breadcrumb-item">Company</li>
    <li class="breadcrumb-item active">
        <a href="#">location</a>
    </li>
    <li class="ml-auto">
        <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#editar">
            Editar
        </button>
    </li>
@endsection

@section('div_principal')
    <div id="mapid">

    <ul id="menuCapa" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation">
            <a role="menuitem" tabindex="-1" href="#" onClick="desplegar();">Mostrar Modal</a>
        </li>
        <li role="presentation" class="divider"></li>
        <li role="presentation">
            <a role="menuitem" tabindex="-1" href="#" onClick="ocultar();">Ocultar Menu</a>
        </li>
        <!--<li role="presentation">
            <a role="menuitem" tabindex="-1" href="#" onClick="desplegar();">Al fondo</a>
        </li>
        <li role="presentation" class="divider"></li>
        <li role="presentation">
            <a role="menuitem" tabindex="-1" href="#" onClick="desplegar();">Restaurar</a>
        </li>
        <li role="presentation" class="divider"></li>
        <li role="presentation">
            <a role="menuitem" tabindex="-1" href="#" onClick="desplegar();">Eliminar</a>
        </li>-->
    </ul>
@endsection


{{--@section('menu-contextual')

@endsection--}}

 <!-- Modal -->
 <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="ModalEditar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Editar Ubicación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span>Nombre</span>
                <input type="text" name="nombre" id="nombre" class="form-control">
                <div class="modal-body row">
                    <span>Marcador</span> &nbsp; &nbsp; &nbsp;
                    <button class="btn btn-small"><i class="fa fa-map-pin"></i></button>&nbsp; &nbsp; &nbsp;
                    <button class="btn btn-small"><i class="fa fa-map-marker"></i></button>&nbsp; &nbsp; &nbsp;
                    <button class="btn btn-small"><i class="icon icon-location-pin"></i></button>&nbsp; &nbsp; &nbsp;
                    <button class="btn btn-small"><i class="icon icon-magic-wand"></i></button>&nbsp; &nbsp; &nbsp;
                    <button class="btn btn-small"><i class="icon icon-home"></i></button>&nbsp; &nbsp; &nbsp;
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    <!--FIN Modal-->

@section('js_mapa')
    <!-- Mapa -->
    <script src="{{ asset('js/company/mapa.js') }}"></script>
@endsection

<!---------Seccion que habilita el uso de location.js------->
@section('scripts')
    <!-- Mapa -->
    <script src="{{ asset('js/company/location.js') }}"></script>
@endsection
