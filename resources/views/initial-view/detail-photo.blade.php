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
            <p class="mr-3"><i class="fa fa-comments text-primary"></i> 15</p>

            <small class="mr-3 like-icon"><a href="/initial-view/detail-photo/{{$photo->photoId}}/like"><i class="far fa-heart text-primary">{{$like}}</i></a></small>

          </div>
        </div>
        <div class="mb-5">
            <img class="card-img-top mb-2" src="{{ asset('storage/' . $photo->file_location) }}" alt="" style="width: 400px;" />
          <p>
            {{ $photo->photo_description }}
          </p>
         

        <!-- Comment List -->
        <div class="mb-5">
          <h2 class="mb-4">3 Comments</h2>
          <div class="media mb-4">
            <div class="media-body">
              <h6>
                John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
              </h6>
              <p>
                Diam amet duo labore stet elitr ea clita ipsum, tempor labore
                accusam ipsum et no at. Kasd diam tempor rebum magna dolores
                sed sed eirmod ipsum. Gubergren clita aliquyam consetetur
                sadipscing, at tempor amet ipsum diam tempor consetetur at
                sit.
              </p>
            </div>
          </div>
        </div>

        <!-- Comment Form -->
        <div class="bg-light p-5">
          <h2 class="mb-4">Leave a comment</h2>
          <form>
            <div class="form-group">
              <label for="name">Name *</label>
              <input type="text" class="form-control" id="name" />
            </div>
            <div class="form-group">
              <label for="email">Email *</label>
              <input type="email" class="form-control" id="email" />
            </div>
            <div class="form-group">
              <label for="website">Website</label>
              <input type="url" class="form-control" id="website" />
            </div>

            <div class="form-group">
              <label for="message">Message *</label>
              <textarea
                id="message"
                cols="30"
                rows="5"
                class="form-control"
              ></textarea>
            </div>
            <div class="form-group mb-0">
              <input
                type="submit"
                value="Leave Comment"
                class="btn btn-primary px-3"
              />
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- Detail End -->

@endsection
