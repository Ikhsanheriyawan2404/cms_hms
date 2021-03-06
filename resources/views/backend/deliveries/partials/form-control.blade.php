<div class="card-body">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="title">Judul <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukan judul" value="{{ $delivery->title ?? old('title') }}">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Customer <span class="text-danger">*</span></label>
                <select name="customer_id" class="form-control select2 @error('customer_id') is-invalid @enderror" style="width: 100%;">
                    <option selected disabled>Pilih customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $customer->id == $delivery->customer_id ? 'selected' : '' }}>{{ $customer->company }}</option>
                    @endforeach
                </select>
                @error('customer_id')
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
                <label for="description">Deskripsi <span class="text-danger">*</span></label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ $delivery->description ?? old('description') }}</textarea>
                @error('description')
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
