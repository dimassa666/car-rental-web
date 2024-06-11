@extends('layout/aplikasi')

@section('konten')
    <x-mainnavbar></x-mainnavbar>

    <div
        style="background-color: #FF3CAC; background-image: linear-gradient(225deg, #784BA0 50%, #2B86C5 100%); height: 72px;">
    </div>

    <div class="booking-top">
        <h2>Pesan Sekarang & Nikmati Perjalanan Anda</h2>
    </div>

    <div class="container mt-5 container-flex">
        <div class="left-column">
            <section class="mobil-detail shadow p-3 mb-4 bg-white">
                <h2>Detail Mobil</h2>
                <div class="car-container">
                    <div class="car-img">
                        <img src="{{ asset('storage/' . $kendaraan->foto) }}" alt="Mercedes Grand Sedan">
                    </div>
                    <div class="car-info text-uppercase">
                        <p>{{ $kendaraan->merk . ' ' . $kendaraan->tipe . ' ' . $kendaraan->tahun_produksi . ' ' . $kendaraan->transmisi }}
                        </p>
                    </div>
                </div>
            </section>

            <div class="rental-form-box shadow p-3 mb-2 bg-white">
                <form id="booking-form" onsubmit="return false;">
                    <div class="container">
                        <h2>Detail Pesanan</h2>
                        <div class="car-details"></div>

                        <!-- Form Pemesanan -->
                        <div class="form-group">
                            <label for="start_date">Tanggal Mulai Sewa</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" required
                                onchange="calculateTotalCost()">
                        </div>

                        <div class="form-group">
                            <label for="start_time">Waktu Mulai</label>
                            <select id="start_time" name="start_time" class="form-control" required
                                onchange="calculateTotalCost()"></select>
                        </div>

                        <div class="form-group">
                            <label for="end_date">Tanggal Pengembalian</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" required
                                onchange="calculateTotalCost()">
                        </div>

                        <div class="form-group">
                            <input type="checkbox" id="delivery" name="tipe-antar" onclick="toggleDeliveryAddress()">
                            <label for="delivery">Antar Kendaraan</label>
                        </div>

                        <div class="form-group" id="delivery_address" style="display: none;">
                            <label for="delivery_address_input">Alamat Antar</label>
                            <input type="text" id="delivery_address_input" name="alamat-antar" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="checkbox" id="pickup" name="tipe-jemput" onclick="togglePickupAddress()">
                            <label for="pickup">Jemput Kendaraan</label>
                        </div>

                        <div class="form-group" id="pickup_address" style="display: none;">
                            <label for="pickup_address_input">Alamat Jemput</label>
                            <input type="text" id="pickup_address_input" name="alamat-jemput" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="checkbox" id="driver" name="sopir" onclick="toggleDriver()">
                            <label for="driver">Gunakan Sopir</label>
                        </div>

                        <input type="hidden" id="hidden_tipe_antar" name="tipe_antar" value="bebas">
                        <input type="hidden" id="hidden_alamat_antar" name="alamat_antar" value="toko">
                        <input type="hidden" id="hidden_tipe_jemput" name="tipe_jemput" value="bebas">
                        <input type="hidden" id="hidden_alamat_jemput" name="alamat_jemput" value="toko">
                        <input type="hidden" id="hidden_sopir" name="sopir" value="tidak">

                        <div class="form-group">
                            <label for="voucher">Voucher</label>
                            <input type="text" id="voucher" name="voucher" class="form-control text-uppercase"
                                placeholder="Masukkan Kode Voucher" oninput="applyVoucher()">
                        </div>
                    </div>
                </form>
            </div>

            <button type="button" class="btn btn-primary checkout-btn mb-3" onclick="submitBooking()">Pesan
                Sekarang</button>

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
            <div class="total-cost-box">
                <h2>Rincian Pesanan</h2>
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

    <script>
        function toggleDeliveryAddress() {
            var deliveryCheckbox = document.getElementById('delivery');
            var deliveryAddress = document.getElementById('delivery_address');
            var hiddenTipeAntar = document.getElementById('hidden_tipe_antar');
            var hiddenAlamatAntar = document.getElementById('hidden_alamat_antar');

            if (deliveryCheckbox.checked) {
                deliveryAddress.style.display = 'block';
                hiddenTipeAntar.value = 'toko';
                hiddenAlamatAntar.value = document.getElementById('delivery_address_input').value;
            } else {
                deliveryAddress.style.display = 'none';
                hiddenTipeAntar.value = 'bebas';
                hiddenAlamatAntar.value = 'toko';
            }
            calculateTotalCost();
        }

        function togglePickupAddress() {
            var pickupCheckbox = document.getElementById('pickup');
            var pickupAddress = document.getElementById('pickup_address');
            var hiddenTipeJemput = document.getElementById('hidden_tipe_jemput');
            var hiddenAlamatJemput = document.getElementById('hidden_alamat_jemput');

            if (pickupCheckbox.checked) {
                pickupAddress.style.display = 'block';
                hiddenTipeJemput.value = 'toko';
                hiddenAlamatJemput.value = document.getElementById('pickup_address_input').value;
            } else {
                pickupAddress.style.display = 'none';
                hiddenTipeJemput.value = 'bebas';
                hiddenAlamatJemput.value = 'toko';
            }
            calculateTotalCost();
        }

        function toggleDriver() {
            var driverCheckbox = document.getElementById('driver');
            var hiddenSopir = document.getElementById('hidden_sopir');

            hiddenSopir.value = driverCheckbox.checked ? 'ya' : 'tidak';
            calculateTotalCost();
        }

        function populateTimeOptions() {
            const startTimeSelect = document.getElementById('start_time');
            const times = [];

            for (let hour = 6; hour <= 21; hour++) {
                for (let min = 0; min < 60; min += 30) {
                    const hourStr = hour < 10 ? '0' + hour : hour;
                    const minStr = min < 10 ? '0' + min : min;
                    times.push(`${hourStr}:${minStr}`);
                }
            }

            times.forEach(time => {
                const option = document.createElement('option');
                option.value = time;
                option.text = time;
                startTimeSelect.appendChild(option);
            });
        }

        function calculateTotalCost() {
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            const delivery = document.getElementById('delivery').checked;
            const pickup = document.getElementById('pickup').checked;
            const driver = document.getElementById('driver').checked;
            const voucher = document.getElementById('voucher').value;

            if (!startDate || !endDate) return;

            const days = (new Date(endDate) - new Date(startDate)) / (1000 * 60 * 60 * 24) + 1;
            if (days <= 0) return;

            const vehicleSubtotal = days * {{ $kendaraan->harga_sewa }};
            const deliveryPickupSubtotal = (delivery ? 50000 : 0) + (pickup ? 50000 : 0);
            const driverSubtotal = driver ? 100000 * days : 0;

            const total = vehicleSubtotal + deliveryPickupSubtotal + driverSubtotal;

            document.getElementById('subtotal_vehicle').textContent = 'Rp' + vehicleSubtotal.toLocaleString();
            document.getElementById('subtotal_delivery_pickup').textContent = 'Rp' + deliveryPickupSubtotal
                .toLocaleString();
            document.getElementById('subtotal_driver').textContent = 'Rp' + driverSubtotal.toLocaleString();

            applyVoucher(total, voucher, (discount, finalTotal) => {
                document.getElementById('discount_voucher').textContent = 'Rp' + discount.toLocaleString();
                document.getElementById('total_payment').textContent = 'Rp' + finalTotal.toLocaleString();
            });
        }

        function applyVoucher(total = 0, voucher = '', callback) {
            fetch('/api/check-voucher', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        voucher: voucher
                    })
                })
                .then(response => response.json())
                .then(data => {
                    let discount = 0;
                    if (data.valid) {
                        discount = total * (data.value / 100);
                    }
                    const finalTotal = total - discount;
                    callback(discount, finalTotal);
                });
        }

        function submitBooking() {
            const form = document.getElementById('booking-form');
            form.submit();
        }

        window.onload = populateTimeOptions;
    </script>
@endsection
