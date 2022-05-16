<div class="card-body">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="title">Judul <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukan judul" value="{{ $service->title ?? old('title') }}">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="customFile">Gambar <small class="text-danger">Abaikan jika tidak menambahakan gambar</small></label>

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
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="contents">Isi Konten <span class="text-danger">*</span></label>
                <textarea name="contents" id="contents" class="form-control @error('contents') is-invalid @enderror">{{ $service->contents ?? old('contents') }}</textarea>
                @error('contents')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>

<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-primary float-right">Simpan</button>
</div>
