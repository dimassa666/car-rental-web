@extends('layout/aplikasi')

@section('konten')
    <x-mainnavbar></x-mainnavbar>

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('main/images/bg_3.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Tentang LuckyRental <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">About Us</h1>
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
                        <span class="subheading">About us</span>
                        <h2 class="mb-4">Tentang LuckyRental</h2>

                        <p>Sejak didirikan pada tahun 2024, LuckyRental telah tumbuh menjadi pilihan terkemuka dalam layanan
                            penyewaan mobil di Indonesia. Dengan layanan yang terpercaya dan berkomitmen untuk memenuhi
                            kebutuhan pelanggan, kami telah melayani ribuan pelanggan yang puas dari berbagai latar belakang
                            dan keperluan. Kami menyediakan beragam kendaraan berkualitas tinggi yang siap mengantarkan Anda
                            ke destinasi Anda dengan nyaman dan aman.</p>
                        <p>Saat Anda memilih LuckyRental, Anda memilih partner perjalanan yang dapat diandalkan, efisien,
                            dan
                            berkualitas tinggi. Bersama kami, Anda akan menemukan solusi penyewaan mobil yang sesuai dengan
                            kebutuhan Anda, sehingga Anda dapat menikmati perjalanan tanpa khawatir dan dengan penuh percaya
                            diri.</p>
                        <p><a href="/kendaraan" class="btn btn-secondary py-3 px-4">Temukan Kendaraan</a></p>
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
                                    <p class="mb-4">"Saya sangat puas dengan layanan LuckyRental. Armada mobil yang
                                        mereka
                                        miliki sangat lengkap dan dalam kondisi prima. Proses pemesanan juga sangat mudah
                                        dan transparan. Sangat direkomendasikan!".</p>
                                    <p class="name">Robin Venorta</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(main/images/person_2.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4"> "LuckyRental memberikan pengalaman penyewaan mobil yang
                                        menyenangkan.
                                        Harga yang ditawarkan sangat kompetitif, dan staf mereka sangat ramah dan membantu.
                                        Mobil yang saya sewa dalam kondisi bersih dan nyaman. Saya pasti akan menggunakan
                                        layanan mereka lagi di masa mendatang."</p>
                                    <p class="name">Jenni Aurellia</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(main/images/person_3.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">"Saya baru pertama kali menggunakan layanan penyewaan mobil, dan saya
                                        sangat senang dengan LuckyRental. Prosesnya cepat dan tanpa hambatan. Mobil yang
                                        saya
                                        sewa dalam kondisi prima dan pengembalian juga sangat mudah. Terima kasih banyak!"
                                    </p>
                                    <p class="name">Alexander Nathanael</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(main/images/person_4.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">"Pengalaman saya menggunakan LuckyRental sangat memuaskan. Staf
                                        mereka
                                        sangat profesional dan membantu, dan armada mobil yang mereka miliki dalam kondisi
                                        prima. Proses pengembalian juga sangat cepat dan mudah. Saya akan merekomendasikan
                                        LuckyRental kepada teman dan keluarga saya."</p>
                                    <p class="name">Piter Bourgh</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-mainfooter></x-mainfooter>
@endsection
