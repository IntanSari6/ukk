@extends('initial-view.main')

@section('container')

<div class="container-fluid pt-5">
  <div class="container">
    <div class="text-center pb-2">
      <p class="section-title px-2">
        <span class="px-2">Foto Terbaru</span>
      </p>
    </div>

    <div class="row pb-3">
      @foreach ($photo as $photo) {{-- Ubah variabel $photo menjadi $photos untuk menghindari konflik --}}
      <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm mb-2">
          <img class="card-img-top mb-2" src="{{ asset('storage/' . $photo->file_location) }}" alt="" style="width: 100%;" />
          <div class="card-body bg-light text-center p-4">
            <h4>{{ $photo->photo_title }}</h4>
            <div class="d-flex justify-content-center mb-3">
              <small class="mr-3"><i class="fa fa-user text-primary"></i> {{ $photo->user->full_name }} </small>
              <small class="mr-3"><i class="fa fa-folder text-primary"></i> {{ $photo->album_name }} </small>
              <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15 </small>
              <small class="mr-3 like-icon"><a href="/like/{$photo->photoId}"><i class="far fa-heart text-primary"></i></a></small>
            </div>
            <p>{{ $photo->photo_description }}</p>
            <a href="/initial-view/detail-photo/{{$photo->photoId}}" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
