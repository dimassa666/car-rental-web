@extends('layout/aplikasi')

@section('konten')
    <x-mainnavbar></x-mainnavbar>

    <div class="hero-wrap ftco-degree-bg" style="background-image: url('main/images/bg_1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                <div class="col-lg-8 ftco-animate">
                    <div class="text w-100 text-center mb-md-5 pb-md-5">
                        <h1 class="mb-4">Cepat &amp; Mudah Sewa Mobil</h1>
                        <p style="font-size: 18px;">"Temukan Mobilitas yang Tak Tertandingi dengan Penawaran Terbaik Kami!
                            <br>Pesan Sekarang dan Nikmati Perjalanan Anda dengan Kendaraan Impian Anda."
                        </p>
                        <a href="#"
                            class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="ion-ios-play"></span>
                            </div>
                            <div class="heading-title ml-5">
                                <span>Langkah Mudah Untuk Menyewa Mobil Impian Anda</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12	featured-top">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex align-items-center">
                            <form action="#" class="request-form ftco-animate bg-primary">
                                <h2>Mulai Perjalananmu</h2>
                                <div class="form-group">
                                    <label for="" class="label">Lokasi Penjemputan</label>
                                    <input type="text" class="form-control"
                                        placeholder="Bandara, Terminal, Stasiun, dll">
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Lokasi Pengembalian</label>
                                    <input type="text" class="form-control"
                                        placeholder="Bandara, Terminal, Stasiun, dll">
                                </div>
                                <div class="d-flex">
                                    <div class="form-group mr-2">
                                        <label for="" class="label">penyewaan</label>
                                        <input type="text" class="form-control" id="book_pick_date"
                                            placeholder="Tanggal">
                                    </div>
                                    <div class="form-group ml-2">
                                        <label for="" class="label"> Pengembalian</label>
                                        <input type="text" class="form-control" id="book_off_date" placeholder="Tanggal">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Waktu Penjemputan</label>
                                    <input type="text" class="form-control" id="time_pick" placeholder="Waktu">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Sewa Mobil Sekarang" class="btn btn-secondary py-3 px-4">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                            <div class="services-wrap rounded-right w-100">
                                <h3 class="heading-section mb-4">Pilihan terbaik untuk Menyewa Mobil Impian Anda</h3>
                                <div class="row d-flex mb-4">
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-route"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Tentukan Lokasi Penjemputan Anda</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-handshake"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Temukan Penawaran Terbaik</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-rent"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Pesan Mobil Pilihan Anda</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p><a href="/kendaraan" class="btn btn-primary py-3 px-4">Pesan Mobil Terbaik Anda</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Penawaran Untuk Anda</span>
                    <h2 class="mb-2">"Kendaraan Unggulan"</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-car owl-carousel">
                        @foreach ($limaKendaraan as $item)
                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end"
                                        style="background-image: url({{ asset('storage/' . $item->foto) }});">
                                    </div>
                                    <div class="text">
                                        <h2 class="mb-0"><a href="/kendaraan/{{ $item->kendaraan_id }}"
                                                class="text-uppercase">{{ $item->tipe . ' ' . $item->tahun_produksi }}</a>
                                        </h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat text-capitalize">{{ $item->merk }}</span>
                                            <p class="price ml-auto">
                                                Rp{{ number_format($item->harga_sewa, 0, ',', '.') }}
                                                <span>/hari</span>
                                            </p>
                                        </div>
                                        <p class="d-flex mb-0 d-block">
                                            <a href="/pesanan/{{ $item->kendaraan_id }}"
                                                class="btn btn-primary py-2 mr-1">Pesan!</a>
                                            <a href="/kendaraan/{{ $item->kendaraan_id }}"
                                                class="btn btn-secondary py-2 ml-1">Detail</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                    style="background-image: url(main/images/about.jpg);">
                </div>
                <div class="col-md-6 wrap-about ftco-animate">
                    <div class="heading-section heading-section-white pl-md-5">
                        <span class="subheading">Tentang LuckyRental</span>
                        <h2 class="mb-4">Selamat Datang Di LuckyRental</h2>

                        <p>Sejak didirikan pada tahun 2024, LuckyRental telah tumbuh menjadi pilihan terkemuka dalam layanan
                            penyewaan mobil di Indonesia. Dengan layanan yang terpercaya dan berkomitmen untuk memenuhi
                            kebutuhan pelanggan, kami telah melayani ribuan pelanggan yang puas dari berbagai latar belakang
                            dan keperluan. Kami menyediakan beragam kendaraan berkualitas tinggi yang siap mengantarkan Anda
                            ke destinasi Anda dengan nyaman dan aman.</p>
                        <p><a href="/about" class="btn btn-primary py-3 px-4">Selengkapnya</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Testimonial</span>
                    <h2 class="mb-3">Kepuasan Pelanggan</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(main/images/person_1.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">"Saya sangat puas dengan layanan LuckyRide. Armada mobil yang mereka
                                        miliki sangat lengkap dan dalam kondisi prima. Proses pemesanan juga sangat mudah
                                        dan transparan. Sangat direkomendasikan!".</p>
                                    <p class="name">Roger Scott</p>
                                    <span class="position">Marketing Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(main/images/person_2.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4"> "LuckyRide memberikan pengalaman penyewaan mobil yang menyenangkan.
                                        Harga yang ditawarkan sangat kompetitif, dan staf mereka sangat ramah dan membantu.
                                        Mobil yang saya sewa dalam kondisi bersih dan nyaman. Saya pasti akan menggunakan
                                        layanan mereka lagi di masa mendatang."</p>
                                    <p class="name">Roger Scott</p>
                                    <span class="position">Interface Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(main/images/person_3.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">"Saya baru pertama kali menggunakan layanan penyewaan mobil, dan saya
                                        sangat senang dengan LuckyRide. Prosesnya cepat dan tanpa hambatan. Mobil yang saya
                                        sewa dalam kondisi prima dan pengembalian juga sangat mudah. Terima kasih banyak!"
                                    </p>
                                    <p class="name">Roger Scott</p>
                                    <span class="position">UI Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(main/images/person_1.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">"Pengalaman saya menggunakan RentRide sangat memuaskan. Staf mereka
                                        sangat profesional dan membantu, dan armada mobil yang mereka miliki dalam kondisi
                                        prima. Proses pengembalian juga sangat cepat dan mudah. Saya akan merekomendasikan
                                        RentRide kepada teman dan keluarga saya."</p>
                                    <p class="name">Roger Scott</p>
                                    <span class="position">Web Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(main/images/person_1.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">"LuckyRide memberikan layanan yang sangat baik. Mereka responsif
                                        terhadap pertanyaan saya sebelum proses pemesanan, dan mobil yang saya sewa dalam
                                        kondisi yang sangat baik. Saya merasa aman dan nyaman selama perjalanan saya. Sangat
                                        direkomendasikan untuk semua orang yang membutuhkan penyewaan mobil yang andal."</p>
                                    <p class="name">Roger Scott</p>
                                    <span class="position">System Analyst</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-counter ftco-section img bg-light" id="section-counter">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="17">0</strong>
                            <span>Tahun <br>Pengalaman</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="{{ $totalKendaraan }}">0</strong>
                            <span>Total <br>Kendaraan</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="2543">0</strong>
                            <span>Kepuasan <br>Pelanggan</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text d-flex align-items-center">
                            <strong class="number" data-number="3">0</strong>
                            <span>Total <br>Cabang</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-mainfooter></x-mainfooter>
@endsection
