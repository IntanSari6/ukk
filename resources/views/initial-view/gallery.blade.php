@extends('initial-view.main')

@section('container')  
<div class="container-fluid pt-5 pb-3">
    <div class="container">
      <div class="text-center pb-2">
        <p class="section-title px-5">
          <span class="px-2">Our Gallery</span>
        </p>
        <h1 class="mb-4">Our Scoop And Skoops Gallery</h1>
      </div>
      <div class="row">
        @foreach ($album as $albums)
        <div class="col-12 col-md-2 text-center mb-2">
          <ul class="list-inline mb-4" id="portfolio-flters">
            <li class="btn btn-outline-primary m-1" data-filter=".first">
              {{$albums->album_name}}
            </li>
          </ul>
        </div>
        @endforeach
      </div>
      
      <div class="row portfolio-container">
        <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
          <div class="position-relative overflow-hidden mb-2">
            <img class="img-fluid w-100" src="" alt="" />
            <div
              class="portfolio-btn bg-primary d-flex align-items-center justify-content-center"
            >
              <a href="assets/img/makanan1.jpeg" data-lightbox="portfolio">
                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
              </a>
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </div>
@endsection