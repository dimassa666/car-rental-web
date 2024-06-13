@extends('layout/aplikasi')

@section('konten')
    <x-mainnavbar></x-mainnavbar>

    <div
        style="background-color: #FF3CAC; background-image: linear-gradient(225deg, #784BA0 50%, #2B86C5 100%); height: 72px;">
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Daftar Pesanan</h2>
                </div>
            </div>
            <div class="row">
                @forelse ($pesanan as $item)
                    <div class="col-md-6 col-lg-4 ftco-animate">
                        <div class="card mb-4 shadow border-primary">
                            <div class="card-body text-xs font-weight-bold text-primary text-uppercase text-center">
                                Pesanan ID: P{{ $item->pesanan_id }}
                            </div>
                            <img src="{{ asset('storage/' . $item->kendaraan->foto) }}"
                                class="card-img-top img-fluid img-equal-height" alt="...">

                            <div class="card-body text-xs text-gray-800">
                                <h3 class="mb-1">
                                    <a href="/kendaraan/{{ $item->kendaraan->kendaraan_id }}"
                                        class="text-uppercase text-dark font-weight-semibold">
                                        {{ $item->kendaraan->tipe . ' ' . $item->kendaraan->tahun_produksi }}
                                    </a>
                                </h3>
                                <p class="mb-0"><strong>Waktu Mulai:</strong>
                                    {{ \Carbon\Carbon::parse($item->waktu_mulai)->locale('id')->isoFormat('D MMMM Y | HH:mm') }}
                                </p>
                                <p class="mb-0"><strong>Waktu Selesai:</strong>
                                    {{ \Carbon\Carbon::parse($item->waktu_selesai)->locale('id')->isoFormat('D MMMM Y | HH:mm') }}
                                </p>
                                <p class="mb-0 text-capitalize">
                                    <strong>Status:</strong>
                                    <span
                                        class="text-uppercase text-white badge 
                                        @if ($item->status_pesanan == 'dibuat') badge-warning 
                                        @elseif($item->status_pesanan == 'dicek') 
                                            badge-primary 
                                        @elseif($item->status_pesanan == 'diterima') 
                                            badge-success 
                                        @elseif($item->status_pesanan == 'selesai') 
                                            badge-secondary 
                                        @elseif($item->status_pesanan == 'dibatalkan') 
                                            badge-danger @endif
                                    ">
                                        {{ $item->status_pesanan }}
                                    </span>
                                </p>

                                @if ($item->detailPesanan)
                                    <p class="mb-0 card-text"><strong>Total Biaya:</strong>
                                        <span class="text-primary font-weight-bold">
                                            Rp{{ number_format($item->detailPesanan->total_pembayaran, 0, ',', '.') }}
                                        </span>
                                    </p>
                                @else
                                    <p class="mb-0 card-text"><strong>Total Biaya:</strong>
                                        <span class="text-primary font-weight-bold">
                                            Rp0
                                        </span>
                                    </p>
                                @endif

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="/pesanan/{{ $item->pesanan_id }}" class="btn btn-primary">Cek Pesanan</a>
                                    @if ($item->status_pesanan == 'dibuat')
                                        <a href="/pesanan/bayar/{{ $item->pesanan_id }}" class="btn btn-success">Bayar
                                            Sekarang</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Kamu belum pernah membuat pesanan.</p>
                        <a href="/kendaraan" class="btn btn-primary">Buat Pesanan</a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <x-mainfooter></x-mainfooter>
@endsection
