@extends('layouts.main')
@section('container')
<div class="row">
    <div class="col-12 mb-4">
    <div class="col-12 d-block d-md-none">
        <img src="{{ asset('img/telkom.jpg') }}" class="d-block rounded-3" height="200" width="100%"
                  alt="...">
    </div>
    <div id="carouselExample" class="carousel slide d-none d-md-block">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="{{ asset('img/homepage.jpg') }}" class="d-block w-100" height="650" width="100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="{{ asset('img/telkom.jpg') }}" class="d-block w-100" height="650" alt="...">
        </div>
        <div class="carousel-item">
        <img src="{{ asset('img/jumbo-img.jpg') }}" class="d-block w-100" height="650" alt="...">
        </div>
    
    </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </div>
    
</div>
<div class="row">
  <div class="col-12">
    <h3 class="fw-bold mb-2">Kategori Pengaduan</h3>
  </div>
</div>
<div class="row mt-2">
        <div class="col">
          <div class="card shadow-sm">
            <img src="img/keamanan.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="mt-0 text-center">Keamanan</h5>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="img/fasilitas.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="mt-0 text-center">Fasilitas</h5>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="img/kebersihan.jpg"  class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="mt-0 text-center">Kebersihan</h5>
            </div>
          </div>
        </div>
</div>  
<div class="row">
  <div class="col-12 p-3">
    <a href="aspirasi" class="btn btn-success w-100">Yuk ajukan Aspirasi Kamu!</a>
  </div>
</div>
@endsection