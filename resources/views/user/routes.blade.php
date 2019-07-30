@extends('layouts.app_user')

<script src="https://kit.fontawesome.com/74faccfdd1.js"></script>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 90%;
    }

    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
    }

    tr:nth-child(even) {
     background-color: #dddddd;
    }

    .centrar{
        text-align: center;
    }
</style>

@section('Marco')
    <div class="container">
        <div class="row" style="padding-top: 60px">
            <div class="col-md-1 col-sm-1">
            </div>
            <div class="col-sm-6 col-md-7 col-lg-5">
                <!--<a class="bg-dark list-group-item list-group-item-action">-->
                    <div class="d-flex w-100 justify-content-start align-items-center">
  			            <input id="search" type="text" placeholder="Buscar..." aria-label="Search" class="form-control">
                    </div>
                </a>
            </div>
        </div>
        <div class="row" style="padding-top: 30px">
            <div class="col-md-1 col-sm-1">
            </div>
            <table>
                <tr>
                    <th>Ruta</th>
                    <!--<th>Desripción</th>-->
                    <th>Acciones</th>
                </tr>
                <tr>
                    <td>San José de la Vega --- UNAH</td>
                    <!--<td></td>-->
                    <td class="centrar">
                        <i class="fa fa-eye"></i> &nbsp; &nbsp;
                        <i class="fa fa-pencil"></i> &nbsp; &nbsp;
                        <i class="far fa-trash-alt"></i>
                    </td>
                </tr>
                <tr>
                    <td>San José de la Vega --- Plaza Miraflores</td>
                    <!--<td></td>-->
                    <td class="centrar">
                        <i class="fa fa-eye"></i> &nbsp; &nbsp;
                        <i class="fa fa-pencil"></i> &nbsp; &nbsp;
                        <i class="far fa-trash-alt"></i>
                    </td>
                </tr>
                <tr>
                    <td>Centro --- UNAH</td>
                    <!--<td></td>-->
                    <td class="centrar">
                        <i class="fa fa-eye"></i> &nbsp; &nbsp;
                        <i class="fa fa-pencil"></i> &nbsp; &nbsp;
                        <i class="far fa-trash-alt"></i>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
