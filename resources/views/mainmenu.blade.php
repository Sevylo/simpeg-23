@extends('layouts/main')
@section('navbar')

<div class="display-2 fst-italic fw-bolder text-center text-primary">WELCOME </div>
<div id="carouselExampleRide" class="carousel slide mt-3 " data-bs-ride="true">
  <div class="carousel-inner rounded img-fluid">
    <div class="carousel-item active">
      <img src="Kantor1.jpg" class="d-block w-100" alt="carsH1">
      <div class="carousel-caption d-none d-md-block text-dark fst-italic">
        <h4>Kepegawaian</h4>
        <p>Aplikasi Sistem Informasi Kepegawaian (SIMPEG) merupakan sebuah perangkat lunak yang membantu dalam proses pengolahan data kepegawaian, memudahkan dalam melakukan fungsi analisis dan pengawasan kepegawaian.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="Kantor2.jpg" class="d-block w-100" alt="carsH2">
    </div>
    <div class="carousel-item">
      <img src="Kantor3.jfif" class="d-block w-100" alt="carsH3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

@endsection
