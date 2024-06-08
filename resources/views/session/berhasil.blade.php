@extends('layout/session')

@section('header')
  <style>
    .gradient-custom {
      background: #6a11cb;
      background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
      background: linear-gradient(to right, rgb(17, 203, 73), rgb(252, 184, 37));
    }
  </style>
@endsection

@section('konten')
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
              <div class="mb-md-5 mt-md-4 pb-5">
                <h2 class="fw-bold mb-2 text-uppercase">Berhasil Mendaftar</h2>
                <br>
                <p class="text-white-50 mb-5">Silahkan masuk ulang!</p>
                <br><br>
                <form action="/logout">
                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Lanjut</button>
                </form>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection