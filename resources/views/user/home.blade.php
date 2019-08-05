@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active">
        <a href="#">Home</a>
    </li>
@endsection

@section('div_principal')
<div id="mapid">

@endsection


@section('js_mapa')
<!-- Mapa -->
    <script src="{{ asset('js/user/mapa.js') }}"></script>
@endsection
