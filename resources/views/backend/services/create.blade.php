@extends('layouts.app', compact('title'))

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">{{ $title ?? '' }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">

        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid mb-3 d-flex justify-content-end">
    <div class="row">
        <div class="col-12">
            {{-- @can('student-create') --}}
                <a href="{{ route('services.index') }}" class="btn btn-sm btn-primary">Kembali <i class="fa fa-arrow-left"></i></a>
            {{-- @endcan --}}
        </div>
    </div>
</div>

<div class="container-fluid">
<!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Tambah Data Service</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('backend.services.partials.form-control')
        </form>
    </div>
<!-- /.card -->
</div>

@endsection

@section('custom-scripts')

<!-- bs-custom-file-input -->
<script src="{{ asset('asset') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- CKEditor -->
<script src="{{ asset('asset') }}/plugins/ckeditor/ckeditor.js"></script>

<script>
    $(document).ready(function() {

        bsCustomFileInput.init();

        $(document).on('submit', 'form', function() {
            $('button').attr('disabled', 'disabled');
        });
    });

    CKEDITOR.replace('contents');
</script>
@endsection
