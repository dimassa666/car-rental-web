@extends('layout/aplikasi')

@section('konten')
    <x-mainnavbar></x-mainnavbar>

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('main/images/bg_3.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/index">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Pilih Kendaraan Anda</h1>
                </div>
            </div>
        </div>
    </section>

    {{-- tampilkan mobil --}}
    <section class="ftco-section bg-light">
        <div class="container">
            <form method="GET" action="{{ route('kendaraan') }}">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 text-white">Filter Kendaraan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <input type="text" name="search" class="form-control" placeholder="Cari..."
                                    value="{{ request('search') }}">
                            </div>
                            <div class="col-md-2">
                                <select name="sort" class="form-control">
                                    <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru
                                    </option>
                                    <option value="harga_terendah"
                                        {{ request('sort') == 'harga_terendah' ? 'selected' : '' }}>Harga Terendah</option>
                                    <option value="harga_tertinggi"
                                        {{ request('sort') == 'harga_tertinggi' ? 'selected' : '' }}>Harga Tertinggi
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="jenis" class="form-control">
                                    <option value="">Jenis</option>
                                    <option value="suv" {{ request('jenis') == 'suv' ? 'selected' : '' }}>SUV</option>
                                    <option value="mpv" {{ request('jenis') == 'mpv' ? 'selected' : '' }}>MPV</option>
                                    <option value="sedan" {{ request('jenis') == 'sedan' ? 'selected' : '' }}>Sedan
                                    </option>
                                    <option value="sport" {{ request('jenis') == 'sport' ? 'selected' : '' }}>Sport
                                    </option>
                                    <option value="convertible" {{ request('jenis') == 'convertible' ? 'selected' : '' }}>
                                        Convertible</option>
                                    <option value="elektrik" {{ request('jenis') == 'elektrik' ? 'selected' : '' }}>
                                        Elektrik</option>
                                    <option value="lcgc" {{ request('jenis') == 'lcgc' ? 'selected' : '' }}>LCGC</option>
                                    <option value="minibus" {{ request('jenis') == 'minibus' ? 'selected' : '' }}>Minibus
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="transmisi" class="form-control">
                                    <option value="">Transmisi</option>
                                    <option value="otomatis" {{ request('transmisi') == 'otomatis' ? 'selected' : '' }}>
                                        Otomatis</option>
                                    <option value="manual" {{ request('transmisi') == 'manual' ? 'selected' : '' }}>Manual
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="harga_min" class="form-control mb-2" placeholder="Harga Min"
                                    value="{{ request('harga_min') }}">
                                <input type="number" name="harga_max" class="form-control" placeholder="Harga Max"
                                    value="{{ request('harga_max') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('kendaraan') }}" class="btn btn-secondary mr-2">Reset</a>
                                <button type="submit" class="btn btn-primary">Gunakan Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>



            <div class="row">
                @foreach ($kendaraan as $item)
                    <div class="col-md-4">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end"
                                style="background-image: url({{ asset('storage/' . $item->foto) }});">
                            </div>
                            <div class="text">
                                <h2 class="mb-0">
                                    <a href="/car-single" class="text-uppercase">
                                        {{ $item->tipe . ' ' . $item->tahun_produksi . ' ' . ($item->transmisi === 'otomatis' ? 'A/T' : 'M/T') }}
                                    </a>
                                </h2>
                                <div class="d-flex mb-3">
                                    <span class="cat text-capitalize">{{ $item->merk }}</span>
                                    <p class="price ml-auto">
                                        Rp{{ number_format($item->harga_sewa, 0, ',', '.') }}<span>/hari</span></p>
                                </div>
                                <p class="d-flex mb-0 d-block">
                                    <a href="/pesanan/{{ $item->kendaraan_id }}"
                                        class="btn btn-primary py-2 mr-1">Pesan!</a>
                                    <a href="/kendaraan/{{ $item->kendaraan_id }}"
                                        class="btn btn-secondary py-2 ml-1">Detail</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        {{ $kendaraan->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </section>




    <x-mainfooter></x-mainfooter>
@endsection
