@extends('layout/session')

@section('konten')

  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          @if ( $errors->any() )
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $item)
                          <li>{{ $item }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <div class="card bg-dark text-white" style="border-radius: 1rem;">

            <form action="/session/login" method="POST">
            @csrf    
            <div class="card-body p-5 text-center">
                <div class="mb-md-5 mt-md-4 pb-5">
                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-white-50 mb-5">Silahkan masuk dan akses fitur sepenuhnya!</p>
                  <div class="form-outline form-white mb-4">
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control form-control-lg" placeholder="Email" />
                  </div>
                  <div class="form-outline form-white mb-4">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Kata sandi" />
                  </div>
                  <br>
                  {{-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> --}}
                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Masuk</button>
                </div>
                <div>
                  <p class="mb-0">Belum punya akun? <a href="/session/register" class="text-white-50 fw-bold">Mendaftar.</a>
                  </p>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection