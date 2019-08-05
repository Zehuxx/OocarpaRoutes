
@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Planes</a>
    </li>
@endsection

@section('cards')
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <strong>Agregar Plan</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input class="form-control" id="name" type="text" placeholder="Introduza el nombre del plan">
                        </div>
                    </div>
                </div>
                <!-- /.row-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="ccnumber">Duración</label>
                            <input class="form-control" id="ccnumber" type="text" placeholder="">
                        </div>
                    </div>
                </div>
                <!-- /.row-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="ccnumber">Precio:</label>
                            <input class="form-control" id="ccnumber" type="number" placeholder="HNL XXXX.XX">
                        </div>
                    </div>
                </div>

                <!-- /.row-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="ccnumber">Descripción:</label>
                            <textarea class="form-control" id="textarea-input" name="textarea-input" rows="4" placeholder="Descripción..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" type="reset">
                    <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
    </div>
    
    <!-- /.col-->
    <div class="col-sm-6">
        <div class="container">
            <div class="row">
                
                <div class="col-sm-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="btn-group float-right">
                                <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-settings"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Editar</a>
                                    <a class="dropdown-item" href="#">Borrar</a>
                                </div>
                            </div>
                            <div class="text-value">Plan base</div>
                            <div>Duración: 1 mes</div>
                            <div>Costo: HNL XXX.XX</div>
                            <div class="progress progress-xs my-2">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small class="text-muted">Descripción</small>
                            <small class="text-muted">Lorem ipsum dolor sit amet enim.</small>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="btn-group float-right">
                                <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-settings"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Editar</a>
                                    <a class="dropdown-item" href="#">Borrar</a>
                                </div>
                            </div>
                            <div class="text-value">Plan Silver</div>
                            <div>Duración: 6 mes</div>
                            <div>Costo: HNL XXX.XX</div>
                            <div class="progress progress-xs my-2">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small class="text-muted">Descripción</small>
                            <small class="text-muted">Lorem ipsum dolor sit amet enim.</small>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="btn-group float-right">
                                    <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-settings"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Editar</a>
                                        <a class="dropdown-item" href="#">Borrar</a>
                                    </div>
                                </div>
                                <div class="text-value">Plan Gold</div>
                                <div>Duración: 1 año</div>
                                <div>Costo: HNL XXX.XX</div>
                                <div class="progress progress-xs my-2">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small class="text-muted">Descripción:</small><br>
                                <small class="text-muted">Lorem ipsum dolor sit amet enim.</small>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    <!-- /.col-->
  </div>
@endsection