@extends('layout/aplikasi')

@section('konten')
    <x-mainnavbar></x-mainnavbar>

    <div
        style="background-color: #FF3CAC; background-image: linear-gradient(225deg, #784BA0 50%, #2B86C5 100%); height: 72px;">
    </div>

    <div class="booking-top">
        <h2>Detail Pesanan Anda</h2>
    </div>

    <div class="container mt-5 container-flex">
        <div class="left-column">
            <section class="mobil-detail shadow p-3 mb-4 bg-white">
                <div class="container">
                    <h5><b>Kendaraan yang dipesan</b></h5>
                    <div class="car-container">
                        <div class="car-img">
                            <img src="{{ asset('storage/' . $kendaraan->foto) }}" alt="Foto Kendaraan" class="img-fluid">
                        </div>
                        <div class="car-info">
                            <p><strong
                                    class="text-uppercase">{{ $kendaraan->merk . ' ' . $kendaraan->tipe . ' ' . $kendaraan->tahun_produksi }}</strong>
                            </p>
                            <p>Transmisi: {{ $kendaraan->transmisi }}</p>
                            <p>Harga sewa: Rp{{ number_format($kendaraan->harga_sewa, 0, ',', '.') }}/hari</p>
                        </div>
                    </div>
                </div>
            </section>

            <div class="rental-form-box shadow p-3 mb-2 bg-white">
                <div class="container">
                    <h5><b>Rincian Pesanan</b></h5>
                    <div class="form-group">
                        <p class="text-uppercase text-primary"><b>ID Pesanan: P{{ $pesanan->pesanan_id }}</b></p>
                        <p>Waktu Mulai:
                            {{ \Carbon\Carbon::parse($pesanan->waktu_mulai)->locale('id')->isoFormat('D MMMM Y | HH:mm') }}
                        </p>
                        <p>Waktu Selesai:
                            {{ \Carbon\Carbon::parse($pesanan->waktu_selesai)->locale('id')->isoFormat('D MMMM Y | HH:mm') }}
                        </p>
                        <p class="text-capitalize">Lama Penyewaan: {{ $pesanan->jumlah_hari }} hari</p>
                        <p class="text-capitalize">Status Pesanan:
                            <span
                                class="badge text-capitalize text-white 
                            @if ($pesanan->status_pesanan == 'dibuat') badge-warning
                            @elseif($pesanan->status_pesanan == 'dicek') badge-primary
                            @elseif($pesanan->status_pesanan == 'diterima') badge-success
                            @elseif($pesanan->status_pesanan == 'selesai') badge-secondary
                            @elseif($pesanan->status_pesanan == 'dibatalkan') badge-danger @endif">
                                {{ $pesanan->status_pesanan }}
                            </span>
                        </p>
                        <p class="text-capitalize">Pakai Sopir: {{ $pesanan->sopir }}</p>
                        <p class="text-capitalize">Ambil kendaraan <span class="text-lowercase">di</span>
                            {{ $lepas_kunci->lokasi_antar }}</p>
                        <p class="text-capitalize">Kembalikan kendaraan <span class="text-lowercase">di</span>
                            {{ $lepas_kunci->lokasi_jemput }}</p>
                        <p class="text-capitalize">Dibuat Pada:
                            {{ \Carbon\Carbon::parse($pesanan->created_at)->locale('id')->isoFormat('D MMMM Y | HH:mm') }}
                        </p>
                    </div>
                </div>
            </div>


            <div class="rental-form-box shadow p-3 mb-2 bg-white">
                <div class="container">
                    <h5><b>Rincian Pembayaran</b></h5>
                    <div class="form-group">
                        <p class="text-capitalize">Metode Pembayaran: <span
                                class="text-uppercase">{{ $pembayaran->metode }}</span></p>
                        <p class="text-capitalize">Jumlah Sudah Dibayar:
                            Rp{{ number_format($pembayaran->jumlah_sudah_dibayar, 0, ',', '.') }}</p>
                        <p class="text-capitalize">Waktu Pembayaran:
                            {{ \Carbon\Carbon::parse($pembayaran->waktu_pembayaran)->locale('id')->isoFormat('D MMMM Y | HH:mm') }}
                        </p>
                        <p class="text-capitalize">Batas Waktu Pembayaran:
                            {{ \Carbon\Carbon::parse($pembayaran->batas_waktu_pembayaran)->locale('id')->isoFormat('D MMMM Y | HH:mm') }}
                        </p>
                        <p class="text-capitalize">Status Pembayaran: {{ $pembayaran->status_pembayaran }}
                        </p>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                        @if ($pembayaran->status_pembayaran == 'belum')
                            <a href="{{ route('pesanan.bayar', ['pesanan_id' => $pembayaran->pesanan_id]) }}"
                                class="btn btn-danger ml-auto text-white">Lakukan Pembayaran</a>
                        @endif
                    </div>
                </div>
            </div>




            <div class="important-info shadow p-3 mb-4 bg-white">
                <h2>Informasi Penting</h2>
                <ul>
                    <li><strong>Periksa Pembatasan Usia.</strong> Pengemudi harus menunjukkan SIM yang valid dan kartu
                        kredit atau debit di konter atas namanya. Penggunaan kartu debit mungkin tunduk pada batasan
                        tertentu atau tidak diperbolehkan di beberapa lokasi. Periksa kebijakan lokasi untuk detailnya.</li>
                    <li>Periksa kebijakan lokasi untuk kemungkinan pembatasan usia atau penyewa lokal.</li>
                    <li>Pembatalan gratis untuk rental mobil tersedia. Lihat Ketentuan Pemesanan untuk kebijakan mitra
                        lengkap.</li>
                    <li>Dengan memilih Book & Pay Later, Anda setuju dengan Ketentuan Pemesanan, Kebijakan dan Aturan Rental
                        Mobil, Syarat & Ketentuan, dan Kebijakan Privasi.</li>
                </ul>
            </div>
        </div>

        <div class="right-column">
            <div class="total-cost-box shadow p-3 mb-4 bg-white">
                <h2>Rincian Biaya</h2>
                <div class="cost-details">
                    <div class="form-group">
                        <label>Subtotal Kendaraan:</label>
                        <span
                            id="subtotal_vehicle">Rp{{ number_format($detail_pesanan->subtotal_kendaraan ?? 0, 0, ',', '.') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Subtotal Antar Jemput:</label>
                        <span
                            id="subtotal_delivery_pickup">Rp{{ number_format($detail_pesanan->subtotal_antar_jemput ?? 0, 0, ',', '.') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Subtotal Sopir:</label>
                        <span
                            id="subtotal_driver">Rp{{ number_format($detail_pesanan->subtotal_sopir ?? 0, 0, ',', '.') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Potongan Voucher:</label>
                        <span
                            id="discount_voucher">Rp{{ number_format($detail_pesanan->potongan_voucher ?? 0, 0, ',', '.') }}</span>
                    </div>
                    <div class="form-group total-payment">
                        <label>Total:</label>
                        <span
                            id="total_payment">Rp{{ number_format($detail_pesanan->total_pembayaran ?? 0, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-mainfooter></x-mainfooter>
@endsection
