@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active">
        <a href="#">Rutas</a>
    </li> 
@endsection



@section('cards')
<div class="row">
    <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12">
        <table style="margin-bottom: 10px">
            <tr>
                <td style="text-align: left;">
                    <a class="btn btn-primary btn-add" href="#"></a>
                </td>
                <td >
                    <form method="get">
                        <input type="text" id="search" value="{{ isset($search) ? $search : ''}}" autofocus="" name="search" placeholder="Filtrar..." style="width: auto;">
                        <input type="submit" style="display: none" />
                    </form>
                </td>
            </tr>
        </table>
        <div class="card">
            <div class="card-header">
                <i class="fa fa-table"></i> Rutas y puntos de transporte
            </div>
            <div class="card-body" style="overflow-x: auto;">
                <table class="table  table-striped table-hover">
                  <tbody>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Ver</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                    <tr>
                        <td>Carrizal-Kennedy</td>
                        <td>Descripcion...sdksdkskdkds
                            sdmsmdmsdk
                            skdkskdkd.
                        </td>
                        <td><a class="btn-see btn btn-primary" href="#"></a></td>
                        <td><a class="btn-edit btn btn-success" href="#"></a></td>
                        <td>
                            <form method="post" action="#">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn-delete btn btn-danger"></ button>
                            </form>
                        </td>
                    </tr>
                    </tr>
                  </tbody>
                </table>
                    
            </div>
        </div>
    </div>
</div>
@endsection

@section('css_js_mapa')
<link href="{{ asset('css/table.css') }}" rel="stylesheet">
@endsection