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
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Hubungi Kami</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-4">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="border w-100 p-4 rounded mb-2 d-flex">
                                <div class="icon mr-3">
                                    <span class="icon-map-o"></span>
                                </div>
                                <p><span>Alamat LuckyRental:</span> Genitri, Tirtomoyo, Pakis, Malang Regency, East Java
                                    65154, Indonesia</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="border w-100 p-4 rounded mb-2 d-flex">
                                <div class="icon mr-3">
                                    <span class="icon-mobile-phone"></span>
                                </div>
                                <p><span>Phone:</span> <a href="tel://1234567920">+62 853 8787 8787</a></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="border w-100 p-4 rounded mb-2 d-flex">
                                <div class="icon mr-3">
                                    <span class="icon-envelope-o"></span>
                                </div>
                                <p><span>Email:</span> <a href="mailto:info@yoursite.com">luckyrental@example.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 block-9 mb-md-5">
                    <form action="#" class="bg-light p-5 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama Anda">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email Anda">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subjek">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Pesan"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Kirim Pesan" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7903.319686842659!2d112.64186642271196!3d-7.930550334504715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629b47da8d8b5%3A0x4a8b7ae703e744ca!2sMPM%20Rent%20Malang%20-%20Service%20Point!5e0!3m2!1sid!2sid!4v1717965175322!5m2!1sid!2sid"
                    width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <x-mainfooter></x-mainfooter>
@endsection
