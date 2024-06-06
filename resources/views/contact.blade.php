@extends('layout/aplikasi')

@section('konten')
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Lucky<span>Ride</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
          <li class="nav-item"><a href="/car" class="nav-link">Cars Book</a></li>
          <li class="nav-item active"><a href="/contact" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
<!-- END nav -->

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('main/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-3 bread">Hubungi Kami</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section contact-section">
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
        <div class="col-md-4">
            <div class="row mb-5">
              <div class="col-md-12">
                  <div class="border w-100 p-4 rounded mb-2 d-flex">
                      <div class="icon mr-3">
                          <span class="icon-map-o"></span>
                      </div>
                    <p><span>Alamat LuckyRide:</span> Genitri, Tirtomoyo, Pakis, Malang Regency, East Java 65154, Indonesia</p>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="border w-100 p-4 rounded mb-2 d-flex">
                      <div class="icon mr-3">
                          <span class="icon-mobile-phone"></span>
                      </div>
                    <p><span>Phone:</span> <a href="tel://1234567920">+62 1235 2355 98</a></p>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="border w-100 p-4 rounded mb-2 d-flex">
                      <div class="icon mr-3">
                          <span class="icon-envelope-o"></span>
                      </div>
                    <p><span>Email:</span> <a href="mailto:info@yoursite.com">LuckyRide@gmail.com</a></p>
                  </div>
              </div>
            </div>
      </div>
      <div class="col-md-8 block-9 mb-md-5">
        <form action="#" class="bg-light p-5 contact-form">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nama Anda">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Email ANda">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="subjek">
          </div>
          <div class="form-group">
            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Pesan"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Kirim Pesan" class="btn btn-primary py-3 px-5">
          </div>
        </form>
      
      </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="map" class="bg-white"></div>
        </div>
    </div>
  </div>
</section>
@endsection