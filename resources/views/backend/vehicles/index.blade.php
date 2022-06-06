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

<div class="container-fluid mb-3 d-flex justify-content-end">
    <div class="row">
        <div class="col-12">
            {{-- @can('student-create') --}}
                {{-- <a href="{{ route('vehicles.create') }}" class="btn btn-sm btn-primary">Tambah <i class="fa fa-plus"></i></a> --}}
                <button class="btn btn-sm btn-primary" id="createNewItem">Tambah <i class="fa fa-plus"></i></button>
            {{-- @endcan --}}
        </div>
    </div>
</div>

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Kendaraan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 1%">No.</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>CBM</th>
                        <th>Berat</th>
                        <th>Description</th>
                        <th>Album</th>
                        <th class="text-center" style="width: 10%"><i class="fas fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- MODAL -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="itemForm" name="itemForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="vehicle_id" id="vehicle_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Kendaraan</label>
                        <input type="text" class="form-control mr-2" name="name" id="name" required>
                    </div>
                    <label for="length">Panjang</label>
                    <div class="input-group mb-2">
                        <input type="number" class="form-control mr-2" name="length" id="length" required>
                        <div class="input-group-append">
                            <span class="input-group-text">Cm</span>
                        </div>
                    </div>
                    <label for="width">Lebar</label>
                    <div class="input-group mb-2">
                        <input type="number" class="form-control mr-2" name="width" id="width" required>
                        <div class="input-group-append">
                            <span class="input-group-text">Cm</span>
                        </div>
                    </div>
                    <label for="height">Tinggi</label>
                    <div class="input-group mb-2">
                        <input type="number" class="form-control mr-2" name="height" id="height" required>
                        <div class="input-group-append">
                            <span class="input-group-text">Cm</span>
                        </div>
                    </div>
                    <label for="weight">Berat</label>
                    <div class="input-group mb-2">
                        <input type="number" class="form-control mr-2" name="weight" id="weight" required>
                        <div class="input-group-append">
                            <span class="input-group-text">Ton</span>
                        </div>
                    </div>
                    <label for="cbm">CBM</label>
                    <div class="input-group mb-2">
                        <input type="number" class="form-control mr-2" name="cbm" id="cbm" required>
                        <div class="input-group-append">
                            <span class="input-group-text">&#13221</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea type="text" class="form-control mr-2" name="description" id="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="album_vehicle_id">Album</label>
                        <select name="album_vehicle_id" id="album_vehicle_id" class="form-control select2" required>
                            <option selected disabled>Pilih album kendaraan</option>
                            @foreach ($album_vehicles as $album_vehicle)
                                <option value="{{ $album_vehicle->id }}">{{ $album_vehicle->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="customFile">Gambar <small class="text-danger">Abaikan jika tidak menambahakan gambar</small></label>

                        <div class="custom-file">
                            <input type="file" name="image" id="image" class="custom-file-input @error('image') is-invalid @enderror" id="customFile">
                            <label class="custom-file-label" for="customFile">Pilih gambar</label>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save</button>
                </div>
            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection

@section('custom-styles')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('asset')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('asset')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

@endsection

@section('custom-scripts')

<!-- bs-custom-file-input -->
<script src="{{ asset('asset') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('asset')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('asset')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('asset')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('asset')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- CKEditor -->
<script src="{{ asset('asset') }}/plugins/ckeditor/ckeditor.js"></script>

<script>

$(document).ready(function () {

    bsCustomFileInput.init();

    let table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,

        ajax: "{{ route('vehicles.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'image', name: 'image'},
            {data: 'name', name: 'name'},
            {data: 'cbm', name: 'cbm'},
            {data: 'weight', name: 'weight'},
            {data: 'description', name: 'description'},
            {data: 'album_vehicle', name: 'album_vehicle.name'},
            {data: 'action', name: 'action', orderable: true, searchable: true},
        ]
    });

    $('#createNewItem').click(function () {
        setTimeout(function () {
            $('#name').focus();
        }, 500);
        $('#saveBtn').removeAttr('disabled');
        $('#saveBtn').html("Simpan");
        $('#vehicle_id').val('');
        $('#itemForm').trigger("reset");
        $('#modal-title').html("Tambah Album Kendaraan");
        $('#modal-lg').modal('show');
    });

    $('body').on('click', '#editItem', function () {
        var vehicle_id = $(this).data('id');
        $.get("{{ route('vehicles.index') }}" +'/' + vehicle_id +'/edit', function (data) {
            $('#modal-lg').modal('show');
            setTimeout(function () {
                $('#name').focus();
            }, 500);
            $('#modal-title').html("Edit Kendaraan");
            $('#saveBtn').removeAttr('disabled');
            $('#saveBtn').html("Simpan");
            $('#vehicle_id').val(data.id);
            $('#name').val(data.name);
            $('#length').val(data.length);
            $('#width').val(data.width);
            $('#height').val(data.height);
            $('#weight').val(data.weight);
            $('#cbm').val(data.cbm);
            $('#description').html(data.description);
            $('#album_vehicle_id').val(data.album_vehicle_id);
            $('#image').val(data.image);
        })
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        var formData = new FormData($('#itemForm')[0]);
        $.ajax({
            // enctype: 'multipart/form-data',
            // data: $('#itemForm').serialize(),
            data: formData,
            url: "{{ route('vehicles.store') }}",
            contentType : false,
            processData : false,
            type: "POST",
            // dataType: 'json',
            success: function (data) {
                $('#saveBtn').attr('disabled', 'disabled');
                $('#saveBtn').html('Simpan ...');
                $('#itemForm').trigger("reset");
                $('#modal-lg').modal('hide');
                table.draw();
            },
            error: function (data) {
                alert("Data masih kosong");
                console.log('Error:', data);
            }
        });
    });
});

</script>

@endsection
