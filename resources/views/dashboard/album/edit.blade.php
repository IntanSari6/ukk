@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 border-bottom">
    <h3>Edit Album</h3>
</div>
<br>

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Gallery Album</h4>
        </div>

        <form method="post" action="/dashboard/album/{{$album->albumId}}" class="mb-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row mb-4">
                    <label for="album_name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Album</label>
                    <div class="col-sm-12 col-md-7">
                        <input class="form-control @error('album_name') is-invalid @enderror" type="text" id="album_name" name="album_name" value="{{$album->album_name}}">
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
                        <textarea id="description" type="hidden" class="summernote-simple" name="description">{{$album->description}}</textarea>
                        <script>
                            $(document).ready(function() {
                                $('.summernote-simple').summernote();
                            });
                        </script>
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
    
@endsection