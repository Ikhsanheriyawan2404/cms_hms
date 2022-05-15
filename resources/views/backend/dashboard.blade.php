@extends('layouts.app', compact('title'))

@section('content')
@include('sweetalert::alert')


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">{{ $title ?? '' }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item active">{{ Breadcrumbs::render('students') }}</li> --}}
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Small boxes (Stat box) -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ $vehicles->count() }}</h3>

            <p>Kendaraan</p>
            </div>
            <div class="icon">
            <i class="fa fa-car"></i>
            </div>
            <a href="{{ route('vehicles.index', []) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
            <h3>{{ $deliveries->count() }}</h3>

            <p>Pengiriman</p>
            </div>
            <div class="icon">
            <i class="fa fa-truck"></i>
            </div>
            <a href="{{ route('deliveries.index', []) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{ $customers->count() }}</h3>

            <p>Pelanggan</p>
            </div>
            <div class="icon">
            <i class="fa fa-users"></i>
            </div>
            <a href="{{ route('customers.index', []) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
            <h3>{{ $services->count() }}</h3>

            <p>Layanan</p>
            </div>
            <div class="icon">
            <i class="fa fa-tools"></i>
            </div>
            <a href="{{ route('services.index', []) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
    </div>
</div>


@endsection
