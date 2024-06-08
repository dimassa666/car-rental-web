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

          <form action="/session/create" method="POST">
          @csrf    
          <div class="card-body p-5 text-center">
              <div class="mb-md-5 mt-md-4 pb-5">
                @if ( Auth::check() && Auth::user()->role == 'karyawan' )
                  <h2 class="fw-bold mb-2 text-uppercase">EMPLOYEE REGISTRATION</h2>
                  <p class="text-white-50 mb-5">Pendaftaran untuk karyawan</p>
                @else
                  <h2 class="fw-bold mb-2 text-uppercase">REGISTRATION</h2>
                  <p class="text-white-50 mb-5">Daftar dan segera pilih pesananmu!</p>
                @endif
                <div class="form-outline form-white mb-4">
                  <input type="text" value="{{ old('nama') }}" name="nama" class="form-control form-control-lg" placeholder="Nama Lengkap" />
                </div>
                <div class="form-outline form-white mb-4">
                  <input type="email" value="{{ old('email') }}" name="email" class="form-control form-control-lg" placeholder="Email" />
                </div>
                <div class="form-outline form-white mb-4">
                  <input type="text" name="password" class="form-control form-control-lg" placeholder="Kata sandi" />
                </div>
                <div class="form-outline form-white mb-4">
                  <input type="text" value="{{ old('no_telepon') }}" name="no_telepon" class="form-control form-control-lg" placeholder="Nomor Telepon" />
                </div>
                <input type="hidden" name="role" value="pelanggan">
                <br>
                {{-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> --}}
                <button class="btn btn-outline-light btn-lg px-5" type="submit">Daftar</button>
              </div>
              <div>
                <p class="mb-0">Sudah punya akun? <a href="/session" class="text-white-50 fw-bold">Masuk.</a>
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