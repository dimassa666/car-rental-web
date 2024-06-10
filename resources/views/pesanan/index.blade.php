@extends('layout/aplikasi')

@section('konten')
    <x-mainnavbar></x-mainnavbar>

    <div
        style="background-color: #FF3CAC; background-image: linear-gradient(225deg, #784BA0 50%, #2B86C5 100%); height: 72px;">
    </div>

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
                        <div class="card mb-4 shadow border-primary">
                            <div class="card-body text-xs font-weight-bold text-primary text-uppercase text-center">
                                Pesanan ID: P{{ $item->pesanan_id }}
                            </div>
                            <img src="{{ asset('storage/' . $item->kendaraan->foto) }}" class="card-img-top" alt="...">
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
                                <p class="mb-0 text-capitalize"><strong>Status:</strong> {{ $item->status_pesanan }}</p>
                                <p class="mb-0 card-text"><strong>Total Biaya:</strong>
                                    <span class="text-primary font-weight-bold">
                                        Rp{{ number_format($item->detailPesanan->total_pembayaran, 0, ',', '.') }}
                                    </span>
                                </p>

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
                @endforeach

            </div>
        </div>
    </section>

    <x-mainfooter></x-mainfooter>
@endsection
