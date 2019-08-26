@extends('layouts.company')

@section('route')
    <li class="breadcrumb-item">Company</li>
    <li class="breadcrumb-item active">
        <a href="#">Banner</a>
    </li>
    <li class="breadcrumb-menu d-md-down-none">
        <div class="btn-group" role="group" aria-label="Button group">
        <a class="btn" href="{{route('company banner add')}}">
                <i class="icon-plus"></i>
            </a>
        </div>
    </li>
@endsection

@section('cards')

<div class="row">
    @foreach ($banners as $banner)

    <div class="col-sm-6 col-md-4">
        <div class="card">
            <div class="card-header">Banner
                <div class="card-header-actions" style="height: 21px;">
                    <button class="btn dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <img src="{{asset('img/banners/'.$banner->img)}}" width="100%" alt="imagen">
            </div>
        </div>
    </div>

    @endforeach
</div>
@endsection
