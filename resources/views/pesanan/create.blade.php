<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdtimepicker/3.3.0/mdtimepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdtimepicker/3.3.0/mdtimepicker.min.js"></script>
</head>

<body>
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

                <section class="mobil-detail shadow p-3 mb-4 bg-white">
                    <div class="container">
                        <h5><b>Kendaraan yang dipesan</b></h5>
                        <div class="car-container">
                            <div class="car-img">
                                <img src="{{ asset('storage/' . $kendaraan->foto) }}" alt="Foto Mobil" class="img-fluid">
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
                    <form id="booking-form" action="{{ route('booking.submit') }}" method="POST">
                        @csrf
                        <div class="container">
                            <h2>Detail Pesanan</h2>
                            <div class="car-details"></div>

                            <!-- Form Pemesanan -->
                            <div class="form-group">
                                <label for="start_date">Tanggal Mulai Sewa</label>
                                <input type="text" id="start_date" name="start_date" class="form-control datepicker"
                                    required onchange="calculateTotalCost()">
                            </div>

                            <div class="form-group">
                                <label for="end_date">Tanggal Pengembalian</label>
                                <input type="text" id="end_date" name="end_date" class="form-control datepicker"
                                    required onchange="calculateTotalCost()">
                            </div>

                            <div class="form-group">
                                <label for="start_time">Waktu Mulai</label>
                                <select id="start_time" name="start_time" class="form-control" required
                                    onchange="calculateTotalCost()">
                                    <option value="">Pilih Waktu Mulai</option>
                                    <option value="06:00">6:00 AM</option>
                                    <option value="07:00">7:00 AM</option>
                                    <option value="08:00">8:00 AM</option>
                                    <option value="09:00">9:00 AM</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="11:00">11:00 AM</option>
                                    <option value="12:00">12:00 PM</option>
                                    <option value="13:00">1:00 PM</option>
                                    <option value="14:00">2:00 PM</option>
                                    <option value="15:00">3:00 PM</option>
                                    <option value="16:00">4:00 PM</option>
                                    <option value="17:00">5:00 PM</option>
                                    <option value="18:00">6:00 PM</option>
                                    <option value="19:00">7:00 PM</option>
                                    <option value="20:00">8:00 PM</option>
                                    <option value="21:00">9:00 PM</option>
                                    <option value="22:00">10:00 PM</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="checkbox" id="delivery" name="delivery" onclick="toggleDeliveryAddress()">
                                <label for="delivery">Antar Kendaraan</label>
                            </div>

                            <div class="form-group" id="delivery_address" style="display: none;">
                                <input type="text" id="delivery_address_input" name="delivery_address_input"
                                    class="form-control" placeholder="Alamat lepas kunci...">
                                <p class="text-danger">Hanya area kota Malang & ditambahkan biaya Rp.50,000</p>
                            </div>

                            <div class="form-group">
                                <input type="checkbox" id="pickup" name="pickup" onclick="togglePickupAddress()">
                                <label for="pickup">Jemput Kendaraan</label>
                            </div>

                            <div class="form-group" id="pickup_address" style="display: none;">
                                <input type="text" id="pickup_address_input" name="pickup_address_input"
                                    class="form-control" placeholder="Alamat pengembalian mobil...">
                                <p class="text-danger">Hanya area kota Malang & ditambahkan biaya Rp.50,000</p>
                            </div>

                            <div class="form-group">
                                <input type="checkbox" id="driver" name="driver" onclick="toggleDriver()">
                                <label for="driver">Gunakan Sopir</label>
                                <p id="driver-cost" class="text-danger" style="display: none;">Sopir terdapat biaya
                                    tambahan
                                    Rp.100,000/hari</p>
                            </div>

                            <div class="form-group">
                                <label for="metode_pembayaran">Metode Pembayaran</label>
                                <select id="metode_pembayaran" name="metode_pembayaran" class="form-control">
                                    <option value=''>Pilih metode pembayaran</option>
                                    <option value="qris">QRIS</option>
                                    <option value="transfer">Transfer</option>
                                    <option value="cash">Tunai</option>
                                </select>
                            </div>

                            <input type="hidden" id="hidden_delivery" name="hidden_delivery" value="toko">
                            <input type="hidden" id="hidden_delivery_address" name="hidden_delivery_address"
                                value="toko">
                            <input type="hidden" id="hidden_pickup" name="hidden_pickup" value="toko">
                            <input type="hidden" id="hidden_pickup_address" name="hidden_pickup_address"
                                value="toko">
                            <input type="hidden" id="hidden_sopir" name="hidden_sopir" value="tidak">
                            <input type="hidden" name="kendaraan_id" value="{{ $kendaraan->kendaraan_id }}">

                            <div class="form-group">
                                <label for="voucher">Voucher</label>
                                <div class="input-group">
                                    <input type="text" id="voucher" name="voucher"
                                        class="form-control text-uppercase" placeholder="Masukkan Kode Voucher"
                                        autocomplete="off">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-secondary"
                                            onclick="checkVoucher()">CEK</button>
                                    </div>
                                </div>
                                <p id="voucher-result" class="mt-2"></p>
                            </div>

                        </div>
                    </form>
                </div>

                <button type="button" class="btn btn-primary checkout-btn mb-3" onclick="submitBooking()">Buat
                    Pesanan</button>

                <div class="important-info shadow p-3 mb-4 bg-white">
                    <h2>Informasi Penting</h2>
                    <ul>
                        <li><strong>Periksa Pembatasan Usia.</strong> Pengemudi harus menunjukkan SIM yang valid dan kartu
                            kredit atau debit di konter atas namanya. Penggunaan kartu debit mungkin tunduk pada batasan
                            tertentu atau tidak diperbolehkan di beberapa lokasi. Periksa kebijakan lokasi untuk detailnya.
                        </li>
                        <li>Periksa kebijakan lokasi untuk kemungkinan pembatasan usia atau penyewa lokal.</li>
                        <li>Pembatalan gratis untuk rental mobil tersedia. Lihat Ketentuan Pemesanan untuk kebijakan mitra
                            lengkap.</li>
                        <li>Dengan memilih Book & Pay Later, Anda setuju dengan Ketentuan Pemesanan, Kebijakan dan Aturan
                            Rental Mobil, Syarat & Ketentuan, dan Kebijakan Privasi.</li>
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
            const unavailableDates = @json($unavailableDates);

            function toggleDeliveryAddress() {
                var deliveryCheckbox = document.getElementById('delivery');
                var deliveryAddress = document.getElementById('delivery_address');
                var hiddenDelivery = document.getElementById('hidden_delivery');
                var hiddenDeliveryAddress = document.getElementById('hidden_delivery_address');
                var deliveryAddressInput = document.getElementById('delivery_address_input');

                if (deliveryCheckbox.checked) {
                    deliveryAddress.style.display = 'block';
                    hiddenDelivery.value = 'bebas';
                    hiddenDeliveryAddress.value = document.getElementById('delivery_address_input').value;
                    deliveryAddressInput.setAttribute('required', 'required');
                } else {
                    deliveryAddress.style.display = 'none';
                    hiddenDelivery.value = 'toko';
                    hiddenDeliveryAddress.value = 'toko';
                    deliveryAddressInput.removeAttribute('required');
                }
                calculateTotalCost();
            }

            function togglePickupAddress() {
                var pickupCheckbox = document.getElementById('pickup');
                var pickupAddress = document.getElementById('pickup_address');
                var hiddenPickup = document.getElementById('hidden_pickup');
                var hiddenPickupAddress = document.getElementById('hidden_pickup_address');
                var pickupAddressInput = document.getElementById('pickup_address_input');

                if (pickupCheckbox.checked) {
                    pickupAddress.style.display = 'block';
                    hiddenPickup.value = 'bebas';
                    hiddenPickupAddress.value = document.getElementById('pickup_address_input').value;
                    pickupAddressInput.setAttribute('required', 'required');
                } else {
                    pickupAddress.style.display = 'none';
                    hiddenPickup.value = 'toko';
                    hiddenPickupAddress.value = 'toko';
                    pickupAddressInput.removeAttribute('required');
                }
                calculateTotalCost();
            }

            function toggleDriver() {
                var driverCheckbox = document.getElementById('driver');
                var driverCost = document.getElementById('driver-cost');
                var hiddenSopir = document.getElementById('hidden_sopir');

                if (driverCheckbox.checked) {
                    driverCost.style.display = 'block';
                    hiddenSopir.value = 'ya';
                } else {
                    driverCost.style.display = 'none';
                    hiddenSopir.value = 'tidak';
                }
                calculateTotalCost();
            }

            function calculateTotalCost() {
                const startDate = document.getElementById('start_date').value;
                const endDate = document.getElementById('end_date').value;
                const delivery = document.getElementById('delivery').checked;
                const pickup = document.getElementById('pickup').checked;
                const driver = document.getElementById('driver').checked;
                const voucher = document.getElementById('voucher').value;

                if (!startDate || !endDate) return;

                const days = (new Date(endDate) - new Date(startDate)) / (1000 * 60 * 60 * 24);
                if (days <= 0) return alert('Pilih tanggal dengan benar!');

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

            function applyVoucher(total, voucher, callback) {
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

            function checkVoucher() {
                calculateTotalCost();
            }

            function submitBooking() {
                const form = document.getElementById('booking-form');
                form.submit();
            }

            $(document).ready(function() {
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    startDate: new Date(),
                    beforeShowDay: function(date) {
                        const dateString = date.toISOString().split('T')[0];
                        return unavailableDates.includes(dateString) ? false : true;
                    }
                });

                $('.timepicker').mdtimepicker({
                    format: 'hh:mm',
                    theme: 'blue',
                    hourPadding: true
                });

                const startDateInput = $('#start_date');
                const endDateInput = $('#end_date');

                startDateInput.on('changeDate', function() {
                    validateDate(startDateInput);
                });

                endDateInput.on('changeDate', function() {
                    validateDate(endDateInput);
                });
            });

            function validateDate(input) {
                const date = input.val();
                if (unavailableDates.includes(date)) {
                    alert('Tanggal ini tidak tersedia untuk pemesanan.');
                    input.val('');
                }
            }
        </script>
    @endsection
</body>

</html>
