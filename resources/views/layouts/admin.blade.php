@extends('layouts.users')

@section('sidebar elements')
    @parent
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="nav-icon icon-speedometer"></i> Dashboard
            <span class="badge badge-primary">NEW</span>
        </a>
    </li>
    <li class="nav-title">Theme</li>
    <li class="nav-item">
        <a class="nav-link" href="colors.html">
            <i class="nav-icon icon-drop"></i> Colors</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="typography.html">
        <i class="nav-icon icon-pencil"></i> Typography</a>
    </li>
    <li class="nav-title">Components</li>
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="nav-icon icon-puzzle"></i> Base</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item">
                <a class="nav-link" href="base/breadcrumb.html">
                    <i class="nav-icon icon-puzzle"></i> Breadcrumb</a>
                </li>
            <li class="nav-item">
                <a class="nav-link" href="base/cards.html">
                    <i class="nav-icon icon-puzzle"></i> Cards</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="base/carousel.html">
                    <i class="nav-icon icon-puzzle"></i> Carousel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="base/collapse.html">
                    <i class="nav-icon icon-puzzle"></i> Collapse</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="base/forms.html">
                    <i class="nav-icon icon-puzzle"></i> Forms</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="base/jumbotron.html">
                    <i class="nav-icon icon-puzzle"></i> Jumbotron</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="base/list-group.html">
                    <i class="nav-icon icon-puzzle"></i> List group</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="base/navs.html">
                    <i class="nav-icon icon-puzzle"></i> Navs</a>
            </li>    
        </ul>
    </li>
@endsection

@section('route')
@endsection

@section('cards')
@endsection