@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Home/Routes</a>
    </li>
@endsection

@section('cards')
<!--<div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-5">
              <h4 class="card-title mb-0">Trafico</h4>
              <div class="small text-muted">Agosto 2019</div>
            </div>

            <div class="col-sm-7 d-none d-md-block">
              <button class="btn btn-primary float-right" type="button">
                <i class="icon-cloud-download"></i>
              </button>
              <div class="btn-group btn-group-toggle float-right mr-3" data-toggle="buttons">
                <label class="btn btn-outline-secondary">
                  <input id="option1" type="radio" name="options" autocomplete="off"> Dias
                </label>
                <label class="btn btn-outline-secondary active">
                  <input id="option2" type="radio" name="options" autocomplete="off" checked=""> Meses
                </label>
                <label class="btn btn-outline-secondary">
                  <input id="option3" type="radio" name="options" autocomplete="off"> Años
                </label>
              </div>
            </div>

          </div>

          <div class="chart-wrapper" style="height:300px;margin-top:40px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas class="chart chartjs-render-monitor" id="main-chart" height="300" style="display: block;" width="1052"></canvas>
          <div id="main-chart-tooltip" class="chartjs-tooltip center" style="opacity: 0; left: 618px; top: 304.064px;"><div class="tooltip-header"><div class="tooltip-header-item">T</div></div><div class="tooltip-body"><div class="tooltip-body-item"><span class="tooltip-body-item-color" style="background-color: rgb(99, 194, 222);"></span><span class="tooltip-body-item-label">My First dataset</span><span class="tooltip-body-item-value">161</span></div><div class="tooltip-body-item"><span class="tooltip-body-item-color" style="background-color: rgb(77, 189, 116);"></span><span class="tooltip-body-item-label">My Second dataset</span><span class="tooltip-body-item-value">84</span></div><div class="tooltip-body-item"><span class="tooltip-body-item-color" style="background-color: rgb(248, 108, 107);"></span><span class="tooltip-body-item-label">My Third dataset</span><span class="tooltip-body-item-value">65</span></div></div></div></div>
        </div>
        <div class="card-footer">
          <div class="row text-center">
            <div class="col-sm-12 col-md mb-sm-2 mb-0">
              <div class="text-muted">Visitas</div>
              <strong>29.703 Usuarios (40%)</strong>
              <div class="progress progress-xs mt-2">
                <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-sm-12 col-md mb-sm-2 mb-0">
              <div class="text-muted">Unique</div>
              <strong>24.093 Usuarios (20%)</strong>
              <div class="progress progress-xs mt-2">
                <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-sm-12 col-md mb-sm-2 mb-0">
              <div class="text-muted">Paginas vistas</div>
              <strong>78.706 Vistas (60%)</strong>
              <div class="progress progress-xs mt-2">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-sm-12 col-md mb-sm-2 mb-0">
              <div class="text-muted">Usuarios Nuevos</div>
              <strong>22.123 Usuarios (80%)</strong>
              <div class="progress progress-xs mt-2">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-sm-12 col-md mb-sm-2 mb-0">
              <div class="text-muted">Bounce Rate</div>
              <strong>40.15%</strong>
              <div class="progress progress-xs mt-2">
                <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>-->
<div class="row">
    <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12">
        <table style="margin-bottom: 10px">
            <tr>
                <td style="text-align: left;">
                    <!--<a class="btn btn-success btn-add" href=""><i class="fa fa-plus"></i></a>-->
                </td>
                <td>
                    <form method="get">
                        <input type="text" id="search" value="{{ isset($search) ? $search : ''}}" autofocus="" name="search" placeholder="Filtrar..." style="width: auto;">
                        <input type="submit" style="display: none" />
                    </form>
                </td>
            </tr>
        </table>

        <div class="card">
            <div class="card-header">
                <i class="fa fa-table"></i>Rutas
            </div>
            <div class="card-body" style="overflow-x: auto;">
                <table class="table  table-striped table-hover">
                    <tbody>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <!--<th>Verificada</th>-->
                            <th>Pública</th>
                            <th>Acciones</th>
                        </tr>
                        <!--INFO DE LAS RUTAS-->
                        @foreach($routes as $route)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$route->name}}</td>
                            <td>{{$route->RouteType['name']}}</td>
                            <td>{{$route->ispublic}}</td>
                            <td>
                                <!--<a class="btn-see btn btn-primary" href=""><i class="fa fa-eye"></i></a>-->
                                <!--<a class="btn-edit btn btn-success" href=""><i class="fa fa-pencil"></i></a>-->


                                 <form action="{{route('destroy route', $route->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <!--<input name="_method" type="hidden" value="DELETE">-->
                                    <button type="submit" class="btn-delete btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <!--FIN INFO RUTAS-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
