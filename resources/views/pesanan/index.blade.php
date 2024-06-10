@extends('layout/aplikasi')

@section('konten')
    <x-mainnavbar></x-mainnavbar>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Pesanan Saya</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($pesanan as $item)
                    <div class="col-md-6 col-lg-4 ftco-animate">
                        <div class="card mb-4 shadow-sm">
                            <img src="{{ asset('storage/' . $item->kendaraan->foto) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">{{ $item->kendaraan->merk }}
                                    {{ $item->kendaraan->tipe }} {{ $item->kendaraan->tahun_produksi }}
                                    {{ $item->tipe . ' ' . $item->tahun_produksi . ' ' . ($item->transmisi === 'otomatis' ? 'A/T' : 'M/T') }}
                                </h5>
                                {{-- <p class="card-text">Total Biaya:
                                    Rp{{ number_format($item->detail_pesanan->total_pembayaran, 0, ',', '.') }}</p> --}}
                                <p class="card-text">Pesanan ID: P{{ $item->pesanan_id }}</p>
                                <p class="card-text">Waktu Mulai: {{ $item->waktu_mulai }}</p>
                                <p class="card-text">Waktu Selesai: {{ $item->waktu_selesai }}</p>
                                <p class="card-text">Status: {{ $item->status_pesanan }}</p>
                                <p class="card-text">Jumlah Hari: {{ $item->jumlah_hari }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-mainfooter></x-mainfooter>
@endsection
