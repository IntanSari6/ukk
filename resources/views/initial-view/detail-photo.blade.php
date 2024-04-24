@extends('initial-view.main')

@section('container')

 <!-- Detail Start -->
 <div class="container py-5">
    <div class="row pt-5">
      <div class="col-lg-8">
        <div class="d-flex flex-column text-left mb-3">
          <p class="section-title pr-5">
            <span class="pr-2">Blog Detail Page</span>
          </p>
          <h1 class="mb-3">{{ $photo->photo_title }}</h1>
          <div class="d-flex">
            <p class="mr-3"><i class="fa fa-user text-primary"></i> {{ $photo->user->full_name }}</p>
            <p class="mr-3">
              <i class="fa fa-folder text-primary"></i> {{ $photo->album_name }}
            </p>
            <p class="mr-3"><i class="fa fa-comments text-primary"></i>{{ $photo->comments_count }}</p>

            <small class="mr-3 like-icon"><a href="/initial-view/detail-photo/{{$photo->photoId}}/like"><i class="fa fa-heart text-primary">{{$like}}</i></a></small>

          </div>
        </div>
        <div class="mb-5">
            <img class="card-img-top mb-2" src="{{ asset('storage/' . $photo->file_location) }}" alt="" style="width: 400px;" />
          <p>
            {{ $photo->photo_description }}
          </p>
      </div>

   <div class="bg-light p-5">
     <div class="row">
    <div class="col-md-6">
        <div class="card" style="margin-top: 20px;">
            <div class="card-header">
                Komentar
            </div>
            <div class="card-body" style="overflow-y: auto; max-height: 400px;"> <!-- Adjust max-height as needed -->
                @foreach ($comment as $singleComment)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Nama: <b>{{ $singleComment->user->full_name }}</b></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Komentar: <b>{{ $singleComment->comment_content }}</b></h6>
                    </div>
                </div>
                @endforeach              
            </div>
        </div>
    </div>
</div>

 
    <div class="row">
        <div class="card-body p-4"> 
            <form id="commentForm" method="post" action="/initial-view/detail-photo/{{ $photoId }}" class="mb-5">
                @csrf
                <small style="line-height:5px"></small>
                <div class="form-floating mb-3">
                    <label for="floatingTextarea2">Komentar</label>
                    <textarea class="form-control @error('comment_content') is-invalid @enderror" id="comment_content" name="comment_content" style="height: 100px" required data-parsley-trigger="keyup">{{ old('comment_content') }}</textarea>
                    @error('comment_content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
    
                <div class="form-floating mb-3">
                    <button type="submit" class="btn btn-primary custom-button">Kirim</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    


    </div>
  </div>
 </div>
  <!-- Detail End -->

@endsection
