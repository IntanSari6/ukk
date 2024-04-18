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
        <div class="col-12 text-center mb-2">
          <ul class="list-inline mb-4" id="portfolio-flters">
            <li class="btn btn-outline-primary m-1 active" data-filter="*">
              Semua
            </li>
            <li class="btn btn-outline-primary m-1" data-filter=".first">
              Makanan
            </li>
            <li class="btn btn-outline-primary m-1" data-filter=".second">
              Minuman
            </li>
            <li class="btn btn-outline-primary m-1" data-filter=".third">
              Ice Cream
            </li>
            <li class="btn btn-outline-primary m-1" data-filter=".Fourthly">
              Toping
            </li>
            <li class="btn btn-outline-primary m-1" data-filter=".fifth">
              Toko
            </li>
            <li class="btn btn-outline-primary m-1" data-filter=".sixth">
              Acara
            </li>
            <li class="btn btn-outline-primary m-1" data-filter=".sixth">
              Acara
            </li>
          </ul>
        </div>
      </div>
      <div class="row portfolio-container">
        <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
          <div class="position-relative overflow-hidden mb-2">
            <img class="img-fluid w-100" src="assets/img/makanan1.jpg" alt="" />
            <div
              class="portfolio-btn bg-primary d-flex align-items-center justify-content-center"
            >
              <a href="assets/img/makanan1.jpeg" data-lightbox="portfolio">
                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
          <div class="position-relative overflow-hidden mb-2">
            <img class="img-fluid w-100" src="assets/img/minuman1.jpg" alt="" />
            <div
              class="portfolio-btn bg-primary d-flex align-items-center justify-content-center"
            >
              <a href="assets/img/minuman1.jpg" data-lightbox="portfolio">
                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 portfolio-item third">
          <div class="position-relative overflow-hidden mb-2">
            <img class="img-fluid w-100" src="assets/img/mr2.jpg" alt="" />
            <div
              class="portfolio-btn bg-primary d-flex align-items-center justify-content-center"
            >
              <a href="assets/img/mr2.jpg" data-lightbox="portfolio">
                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
          <div class="position-relative overflow-hidden mb-2">
            <img class="img-fluid w-100" src="assets/img/makanan2.jpeg" alt="" />
            <div
              class="portfolio-btn bg-primary d-flex align-items-center justify-content-center"
            >
              <a href="assets/img/portfolio-4.jpg" data-lightbox="portfolio">
                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
          <div class="position-relative overflow-hidden mb-2">
            <img class="img-fluid w-100" src="assets/img/minuman2.jpg" alt="" />
            <div
              class="portfolio-btn bg-primary d-flex align-items-center justify-content-center"
            >
              <a href="assets/img/minuman2.jpg" data-lightbox="portfolio">
                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 portfolio-item third">
          <div class="position-relative overflow-hidden mb-2">
            <img class="img-fluid w-100" src="assets/img/mr3.jpg" alt="" />
            <div
              class="portfolio-btn bg-primary d-flex align-items-center justify-content-center"
            >
              <a href="assets/img/mr3.jpg" data-lightbox="portfolio">
                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 portfolio-item Fourthly">
          <div class="position-relative overflow-hidden mb-2">
            <img class="img-fluid w-100" src="assets/img/toping.jpg" alt="" />
            <div
              class="portfolio-btn bg-primary d-flex align-items-center justify-content-center"
            >
              <a href="assets/img/toping.jpg" data-lightbox="portfolio">
                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 portfolio-item fifth">
          <div class="position-relative overflow-hidden mb-2">
            <img class="img-fluid w-100" src="assets/img/people1.jpg" alt="" />
            <div
              class="portfolio-btn bg-primary d-flex align-items-center justify-content-center"
            >
              <a href="assets/img/people1.jpg" data-lightbox="portfolio">
                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 portfolio-item sixth">
          <div class="position-relative overflow-hidden mb-2">
            <img class="img-fluid w-100" src="assets/img/event.jpg" alt="" />
            <div
              class="portfolio-btn bg-primary d-flex align-items-center justify-content-center"
            >
              <a href="assets/img/event.jpg" data-lightbox="portfolio">
                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection