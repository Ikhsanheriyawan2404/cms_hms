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

<div class="container col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Gambar About Header</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="my-3">
                <img class="img-fluid img-thumbnail" width="100%" src="{{ $about_header->takeImage }}">
            </div>

            <form action="{{ route('about_header.updateImage', $about_header->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">

                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="customFile">
                        <label class="custom-file-label" for="customFile">Pilih gambar</label>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm float-right">Simpan Gambar</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data About</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 1%">No.</th>
                        <th>Quote</th>
                        <th>Keyword</th>
                        <th>Deskripsi</th>
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
<div class="modal fade" id="modal-md">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="itemForm" name="itemForm">
                @csrf
                <input type="hidden" name="about_header_id" id="about_header_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="quote">Quote</label>
                        <input type="text" class="form-control mr-2" name="quote" id="quote" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="keyword">Keyword</label>
                        <input type="text" class="form-control mr-2" name="keyword" id="keyword" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <input type="text" class="form-control mr-2" name="description" id="description" required>
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

<!-- DataTables  & Plugins -->
<script src="{{ asset('asset')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('asset')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('asset')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('asset')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>

$(document).ready(function () {

    let table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,

        ajax: "{{ route('about_header.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'quote', name: 'quote'},
            {data: 'keyword', name: 'keyword'},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: true, searchable: true},
        ]
    });

    $('body').on('click', '#editItem', function () {
        var about_header_id = $(this).data('id');
        $.get("{{ route('about_header.index') }}" +'/' + about_header_id +'/edit', function (data) {
            $('#modal-md').modal('show');
            setTimeout(function () {
                $('#quote').focus();
            }, 1000);
            $('#modal-title').html("Edit About Header");
            $('#saveBtn').val("Edit");
            $('#about_header_id').val(data.id);
            $('#quote').val(data.quote);
            $('#keyword').val(data.keyword);
            $('#description').val(data.description);
        })
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        // $(this).html('Sending..');

        $.ajax({
            data: $('#itemForm').serialize(),
            url: "{{ route('about_header.store') }}",
            type: "POST",
            // dataType: 'json',
            success: function (data) {
                $('#itemForm').trigger("reset");
                $('#modal-md').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save');
            }
        });
    });

    $(document).on('submit', 'form', function() {
        $('button').attr('disabled', 'disabled');
    });

    bsCustomFileInput.init();
});

</script>

@endsection
