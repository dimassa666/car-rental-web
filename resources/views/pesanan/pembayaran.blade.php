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
                    <h2 class="mb-4">Lakukan Pembayaran!</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow border-primary mb-4">
                        <div class="card-body">
                            <h3 class="text-center mb-4">Total Pembayaran:
                                <span class="price">Rp{{ number_format($detail_pesanan->total_pembayaran, 0, ',', '.') }}
                                </span>
                            </h3>

                            <div class="accordion mb-4" id="paymentAccordion">
                                <div class="card">
                                    <div class="card-header" id="headingQRIS">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#collapseQRIS" aria-expanded="true"
                                                aria-controls="collapseQRIS">
                                                Kode QRIS
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseQRIS" class="collapse show" aria-labelledby="headingQRIS"
                                        data-parent="#paymentAccordion">
                                        <div class="card-body d-flex justify-content-center">
                                            <img src="{{ asset('img/qris.jpg') }}" alt="QRIS Code" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingRekening">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapseRekening" aria-expanded="false"
                                                aria-controls="collapseRekening">
                                                Info Rekening
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseRekening" class="collapse" aria-labelledby="headingRekening"
                                        data-parent="#paymentAccordion">
                                        <div class="card-body">
                                            <p>Bank BCA: 6787678767 - (A/N Hieronimus Pradnya N.)</p>
                                            <p>Bank BNI: 8987898789 - (A/N Dimas Sirajuddin A.)</p>
                                            <p>Bank BRI: 4565456545 - (A/N Nur Wibisana K.)</p>
                                            <p>Bank Mandiri: 1232123212 - (A/N Benaya Ariobimo P.)</p>
                                        </div>
                                    </div>
                                </div>
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
                                    <label for="foto_bukti">Foto Bukti</label>
                                    <input type="file" class="form-control" id="foto_bukti" name="foto_bukti" required>
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
