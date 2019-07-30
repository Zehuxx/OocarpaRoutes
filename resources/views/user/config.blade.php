@extends('layouts.app_user')

<style>
    td, th {
        text-align: left;
        padding: 8px;
    }
</style>

@section('Marco')
<div class="container">
    <div class="row" style="padding-top: 80px">
        <div class="col-md-1 col-sm-1">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
            <img src="{{ asset('img/user.jpg')}}"  id="circle">
        </div>
        <div class="col-sm-3 col-md-3 col-lg-2 col-xl-2">
            <button class="btn btn-large btn-primary">
                Modificar foto de perfil
            </button>
        </div>
    </div>
    <div class="row" style="padding-top: 16px">
       <div class="col-md-1">
       </div>
       <div class="col-sm-5 col-md-5 col-lg-3">
            <h2>Inicio de sesión</h2>
       </div>
    </div>
    <div class="row" style="padding-top: 15px">
        <div class="col-md-1">
        </div>
        <table>
            <tr>
                <td>Correo Electrónico</td>
                <td><span class="form-control">correo@dominio.com</span></td>
                <td>
                    <button class="btn btn-primary form-control">
                        Editar
                    </button>
                </td>
            </tr>
            <tr>
            <td>Contraseña</td>
                <td><span class="form-control">**********</span></td>
                <td>
                    <button class="btn btn-primary form-control">
                        Editar
                    </button>
                </td>
            </tr>
        </table>
    </div>

    <div class="row" style="padding-top: 16px">
       <div class="col-md-1">
       </div>
       <div class="col-sm-5 col-md-5 col-lg-3">
            <h2>Información</h2>
       </div>
    </div>
    <div class="row" style="padding-top: 15px">
        <div class="col-md-1">
        </div>
        <table>
            <tr>
                <td>Nombre de Usuario</td>
                <td><input type="text" value="El Caballero de la noche" class="form-control"></td>
            </tr>
            <tr>
                <td>Sexo</td>
                <td>
                    <select name="slc-sexo" id="slc-sexo" class="form-control">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </td>
            </tr>
            <tr>
            <td>Municipio</td>
            <td>
                <select name="slc-municipio" id="slc-municipio" class="form-control">
                    <option value="1">Distrito Central</option>
                    <option value="2">San Pedro Sula</option>
                </select>
            </td>
            </tr>
            <tr>
                <td>
                <button class="btn btn-primary">Guardar</button>
                </td>
            </tr>
        </table>
    </div>

@endsection
