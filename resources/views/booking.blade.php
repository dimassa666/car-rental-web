@extends('layout/aplikasi')

@section('konten')

<x-mainnavbar></x-mainnavbar>
<section class="nav-booking-1">
    <div>
    </div>
</nav>

<section>
    <h1>Langkah-langkah</h1>
</section>
<section class="nav-booking" id="scrollable-section">
    <div class="image-container">
        <img src="main/images/image_9.jpeg" alt="">
        <img src="main/images/image_1.jpg" alt="">
        <img src="main/images/image_8.jpeg" alt=""> 
        <img src="main/images/image_6.jpg" alt="">
        <img src="main/images/image_5.jpg" alt="">
        <img src="main/images/image_10.jpeg" alt="">
        <img src="main/images/image_4.jpg" alt=""> 
        <img src="main/images/image_7.jpeg" alt="">
        <img src="main/images/image_9.jpeg" alt="">
        <img src="main/images/image_1.jpg" alt="">
        <img src="main/images/image_8.jpeg" alt=""> 
        <img src="main/images/image_6.jpg" alt="">
        <img src="main/images/image_5.jpg" alt="">
        <img src="main/images/image_10.jpeg" alt="">
        <img src="main/images/image_4.jpg" alt=""> 
        <img src="main/images/image_7.jpeg" alt="">
        <img src="main/images/image_7.jpeg" alt="">
        <img src="main/images/image_9.jpeg" alt="">
        <img src="main/images/image_1.jpg" alt="">
        <img src="main/images/image_8.jpeg" alt=""> 
        <img src="main/images/image_6.jpg" alt="">
        <img src="main/images/image_5.jpg" alt="">
        <img src="main/images/image_10.jpeg" alt="">
        <img src="main/images/image_4.jpg" alt=""> 
        <img src="main/images/image_7.jpeg" alt="">
        <img src="main/images/image_7.jpeg" alt="">
        <img src="main/images/image_9.jpeg" alt="">
        <img src="main/images/image_1.jpg" alt="">
        <img src="main/images/image_8.jpeg" alt=""> 
        <img src="main/images/image_6.jpg" alt="">
        <img src="main/images/image_5.jpg" alt="">
        <img src="main/images/image_10.jpeg" alt="">
        <img src="main/images/image_4.jpg" alt=""> 
        <img src="main/images/image_7.jpeg" alt="">
        <!-- tambahkan gambar lainnya -->
    </div>
   </section>
<div class="booking-top">
    <h2>Pesan Sekarang & Nikmati Perjalanan Anda</h2>
</div>
    <div class="container mt-5 container-flex">
        <div class="left-column">
            <div class="rental-form-box shadow p-3 mb-4 bg-white">
                <form oninput="calculateTotalCost()">
                                        <!-- Booking Details -->
                    <div class="container">
                        <h2>Detail Pesanan</h2>
                        <div class="car-details">
                            <!-- Detail mobil akan ditampilkan di sini -->
                        </div>

                        <!-- Form Pemesanan -->
                        <form action="#" method="POST">
                            <!-- Tanggal Periode -->
                            <div class="form-group">
                                <label for="start_date">Tanggal Mulai</label>
                                <input type="date" id="start_date" name="start_date" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="end_date">Tanggal Selesai</label>
                                <input type="date" id="end_date" name="end_date" class="form-control" required>
                            </div>

                            <!-- Checkbox Antar Kendaraan & Jemput Kendaraan -->
                            <div class="form-group">
                                <input type="checkbox" id="delivery" name="delivery" onclick="toggleDeliveryAddress()">
                                <label for="delivery">Antar Kendaraan</label>
                            </div>

                            <div class="form-group" id="delivery_address" style="display: none;">
                                <label for="delivery_address_input">Alamat Antar</label>
                                <input type="text" id="delivery_address_input" name="delivery_address" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="checkbox" id="pickup" name="pickup" onclick="togglePickupAddress()">
                                <label for="pickup">Jemput Kendaraan</label>
                            </div>

                            <div class="form-group" id="pickup_address" style="display: none;">
                                <label for="pickup_address_input">Alamat Jemput</label>
                                <input type="text" id="pickup_address_input" name="pickup_address" class="form-control">
                            </div>

                            <!-- Checkbox Gunakan Sopir -->
                            <div class="form-group">
                                <input type="checkbox" id="driver" name="driver">
                                <label for="driver">Gunakan Sopir</label>
                            </div>

                            <!-- Input Voucher -->
                            <div class="form-group">
                                <label for="voucher">Voucher</label>
                                <input type="text" id="voucher" name="voucher" class="form-control" placeholder="Masukan Kode Vocer">
                            </div>
                        </form>
                    </div>
                </form>
            </div>

<script>
    function toggleDeliveryAddress() {
        var deliveryAddress = document.getElementById('delivery_address');
        deliveryAddress.style.display = deliveryAddress.style.display === 'none' ? 'block' : 'none';
    }

    function togglePickupAddress() {
        var pickupAddress = document.getElementById('pickup_address');
        pickupAddress.style.display = pickupAddress.style.display === 'none' ? 'block' : 'none';
    }
</script>

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
            <div class="button-wrap">
                <button type="button" class="checkout-btn btn-primary" onclick="window.location.href='index.html'">Pesan Sekarang</button>            </div>
        
        </div>
        <div class="right-column">
            <div class="total-cost-box  ">
                <h2>Rincian Pesanan</h2>
                 <!-- Subtotal dan Total Pembayaran -->
        <div class="cost-details">
            <div class="form-group div">
                <label>Subtotal Kendaraan:</label>
                <span id="subtotal_vehicle">Rp0</span>
            </div>

            <div class="form-group div">
                <label>Subtotal Antar Jemput:</label>
                <span id="subtotal_delivery_pickup">Rp0</span>
            </div>

            <div class="form-group div">
                <label>Subtotal Sopir:</label>
                <span id="subtotal_driver">Rp0</span>
            </div>

            <div class="form-group vocer">
                <label>Potongan Voucher:</label>
                <span id="discount_voucher">Rp0</span>
            </div>

            <div class="form-group total-payment">
                <label>Total:</label>
                <span id="total_payment">Rp0</span>
            </div>
        </div>
            </div>
        </div>
    </div>

    <x-mainfooter></x-mainfooter>

@endsection