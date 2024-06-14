<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="" href="/">
            <img src="/img/lrlogo.png" alt="LuckyRide" style="max-height: 55px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}"><a href="/about"
                        class="nav-link">About</a></li>
                <li class="nav-item {{ Request::is('kendaraan') ? 'active' : '' }}"><a href="/kendaraan"
                        class="nav-link">Sewa</a></li>
                <li class="nav-item {{ Request::is('kontak') ? 'active' : '' }}"><a href="/kontak"
                        class="nav-link">Kontak</a></li>

                @if (Auth::user())
                    <div class="btn-group d-flex align-items-center">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{ explode(' ', trim(Auth::user()->nama))[0] }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">{{ Auth::user()->nama }} </a>
                            <a class="dropdown-item" href="/pesanan">Pesanan saya</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">Keluar</a>
                        </div>
                    </div>
                @else
                    <a href="/session" class="nav-item d-flex align-items-center">
                        <button type="button" class="btn btn-primary">LogIn</button>
                    </a>
                @endif
            </ul>
        </div>
    </div>
</nav>
