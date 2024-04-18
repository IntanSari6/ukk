@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 border-bottom">
    <h3>Tambah Album</h3>
</div>
<br>

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Gallery Album</h4>
        </div>

        <form method="post" action="/dashboard/album" class="mb-5" enctype="multipart/form-data">
          @csrf
          <input type="hidden" >
        <div class="card-body">
        <div class="form-group row mb-4">
          <label for="album_name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Album</label>
          <div class="col-sm-12 col-md-7">
              <input class="form-control @error('album_name') is-invalid @enderror" type="text" id="album_name" name="album_name">
          </div>
        </div>
        @error('album_name')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror

        <div class="form-group row mb-4">
          <label for="description" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
          <div class="col-sm-12 col-md-7">
            <textarea id="description" type="hidden" name="description" value="{{ old('description') }}" class="summernote-simple"></textarea>
          </div>
        </div>

        {{-- <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Unggah</label>
          <div class="col-sm-12 col-md-7">
              <input type="datetime-local" name="date_created" class="form-control">
          </div>
        </div> --}}

          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button type="submit" class="btn btn-primary">Publish</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
    
@endsection