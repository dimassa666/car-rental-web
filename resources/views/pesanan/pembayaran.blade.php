@extends('layout/aplikasi')

@section('konten')
    <x-mainnavbar></x-mainnavbar>

    <div
        style="background-color: #FF3CAC; background-image: linear-gradient(225deg, #784BA0 50%, #2B86C5 100%); height: 72px;">
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center">

                {{-- Alert validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-md-8">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="text-center my-5 border border-primary"
                                style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                                <h2 style="font-size: 32px;">Total Pembayaran:</h2>
                                <strong
                                    style="font-size: 24px; color: #007bff;">Rp{{ number_format($detail_pesanan->total_pembayaran, 0, ',', '.') }}</strong>
                            </div>

                            <div class="accordion mb-4" id="paymentAccordion">
                                @if ($pembayaran->metode == 'qris')
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                Kode QRIS
                                            </h5>
                                        </div>
                                        <div class="card-body d-flex justify-content-center">
                                            <img src="{{ asset('img/qris.jpg') }}" alt="QRIS Code" class="img-fluid">
                                        </div>
                                    </div>
                                @elseif ($pembayaran->metode == 'transfer')
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                Info Rekening
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <p>Bank BCA: 6787678767 - (A/N Hieronimus Pradnya N.)</p>
                                            <p>Bank BRI: 4565456545 - (A/N Nur Wibisana K.)</p>
                                            <p>Bank BNI: 8987898789 - (A/N Dimas Sirajuddin A.)</p>
                                            <p>Bank Mandiri: 1232123212 - (A/N Benaya Ariobimo P.)</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">
                                                Pembayaran Tunai
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <p>Lakukan pembayaran di cabang terdekat dan Kirim bukti pembayaran.</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <form action="{{ route('pesanan.submitPembayaran', $pesanan->pesanan_id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="jumlah_sudah_dibayar">Jumlah Sudah Dibayar</label>
                                    <input type="number" class="form-control" id="jumlah_sudah_dibayar"
                                        name="jumlah_sudah_dibayar" required>
                                </div>
                                <div class="form-group">
                                    <label for="waktu_pembayaran">Waktu Pembayaran</label>
                                    <input type="datetime-local" class="form-control" id="waktu_pembayaran"
                                        name="waktu_pembayaran" required>
                                </div>
                                <div class="form-group">
                                    <label for="foto_pembayaran">Foto Bukti Pembayaran</label>
                                    <input type="file" class="form-control" id="foto_pembayaran" name="foto_pembayaran"
                                        required>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Kirim Bukti Pembayaran</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-mainfooter></x-mainfooter>
@endsection
