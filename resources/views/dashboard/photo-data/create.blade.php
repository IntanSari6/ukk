@extends('dashboard.layout.main');

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 border-bottom">
    <h3>Tambah Foto</h3>
</div>
<br>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Gallery Foto</h4>
              </div>

              <form method="post" action="/dashboard/photo-data" class="mb-5" enctype="multipart/form-data">
                @csrf
                <input type="hidden" >
              <div class="card-body">
              <div class="form-group row mb-4">
                <label for="photo_title" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Foto</label>
                <div class="col-sm-12 col-md-7">
                    <input class="form-control @error('photo_title') is-invalid @enderror" type="text" id="photo_title" name="photo_title">
                </div>
              </div>
              @error('photo_title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror

              <div class="form-group row mb-4">
                <label for="photo_description" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                <div class="col-sm-12 col-md-7">
                  <textarea id="photo_description" type="hidden" name="photo_description" value="{{ old('photo_description') }}" class="summernote-simple"></textarea>
                </div>
              </div>
              
              <div class="form-group row mb-4">
                <label for="file_location" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi file</label>
                <div class="col-sm-12 col-md-7">
                    <input class="form-control @error('file_location') is-invalid @enderror" type="file" id="file_location" name="file_location" onchange="previewImage()">
                </div>
              </div>
              @error('file_location')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Album Id</label>
                <div class="col-sm-12 col-md-7">
                  <select name="albumId" class="form-control selectric">
                   <option disable value="">Pilih Album</option>
                   @foreach ($album as $item)
                       <option value="{{ $item->albumId }}">{{ $item->album_name }}</option>
                   @endforeach
                  </select>
                </div>
              </div>

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

        <script>
            function previewImage() {
                const image = document.querySelector('#photo_title');
                const imgPreview = document.querySelector('.img-preview');
            
                imgPreview.style.display = 'block';
            
                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);
            
                oFReader.onload = function(oFREvent) {
                  imgPreview.src = oFREvent.target.result;
                }
            }
            </script>

@endsection