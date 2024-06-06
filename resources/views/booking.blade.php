@extends('layout/aplikasi')

@section('konten')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.html">Lucky<span>Ride</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="/car">Mobil</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<section>
    <h1>Langkah-langkah</h1>
</section>

<div class="container mt-5 container-flex">
    <div class="left-column">
        <div class="rental-form-box shadow p-3 mb-4 bg-white">
            <form oninput="calculateTotalCost()">
                <div class="form-group">
                    <label for="carModel">Model Mobil</label>
                    <input type="text" class="form-control" id="carModel" placeholder="Masukkan model mobil">
                </div>
                <div class="form-group">
                    <label for="rentalDate">Tanggal Penyewaan</label>
                    <input type="date" class="form-control" id="rentalDate">
                </div>
                <div class="form-group">
                    <label for="returnDate">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" id="returnDate">
                </div>
                <div class="form-group">
                    <label for="customerName">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="customerName" placeholder="Masukkan nama Anda">
                </div>
                <div class="form-group">
                    <label for="customerEmail">Email Pelanggan</label>
                    <input type="email" class="form-control" id="customerEmail" placeholder="Masukkan email Anda">
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>

        <!-- Bagian Informasi Penting -->
        <div class="important-info shadow p-3 mb-4 bg-white">
            <h2>Informasi Penting</h2>
            <ul>
                <li><strong>Periksa Pembatasan Usia.</strong> Pengemudi harus menunjukkan SIM yang valid dan kartu kredit atau debit di konter atas namanya. Penggunaan kartu debit mungkin tunduk pada batasan tertentu atau tidak diperbolehkan di beberapa lokasi. Periksa kebijakan lokasi untuk detailnya.</li>
                <li>Periksa kebijakan lokasi untuk kemungkinan pembatasan usia atau penyewa lokal.</li>
                <li>Pembatalan gratis untuk rental mobil tersedia. Lihat Ketentuan Pemesanan untuk kebijakan mitra lengkap.</li>
                <li>Dengan memilih Book & Pay Later, Anda setuju dengan Ketentuan Pemesanan, Kebijakan dan Aturan Rental Mobil, Syarat & Ketentuan, dan Kebijakan Privasi.</li>
            </ul>
        </div>
    </div>
    <div class="right-column">
        <div class="total-cost-box border rounded p-3 mb-4 sticky-top">
            <h2>Total Biaya</h2>
            <p id="total-cost">$0.00</p>
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
@endsection