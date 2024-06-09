@extends('layout.admin')

@section('konten')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Selamat datang {{ Auth::user()->nama }}.</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Total Users Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Users</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Kendaraan Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Kendaraan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalKendaraan }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Pesanan Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pesanan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPesanan }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Voucher Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Voucher</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalVoucher }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <!-- Row for Orders -->

        <div class="row">
            <!-- Card for each order -->
            @foreach ($ongoingOrders as $order)
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Pesanan ID: P{{ $order->pesanan_id }}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-uppercase">
                                        {{ $order->kendaraan->merk }}
                                        {{ $order->kendaraan->tipe }}
                                        {{ $order->kendaraan->tahun_produksi }}</div>
                                    <div class="text-xs text-gray-800">
                                        <strong>Pelanggan:</strong> {{ $order->users->nama }}<br>

                                        <strong>Waktu Mulai:</strong>
                                        {{ \Carbon\Carbon::parse($order->waktu_mulai)->locale('id')->isoFormat('HH:mm | D MMMM Y') }}<br>
                                        <strong>Waktu Selesai:</strong>
                                        {{ \Carbon\Carbon::parse($order->waktu_selesai)->locale('id')->isoFormat('HH:mm | D MMMM Y') }}<br>
                                        <strong>Harga Sewa:</strong>
                                        Rp{{ number_format($order->kendaraan->harga_sewa, 0, ',', '.') }}<br>
                                        <strong>Plat Nomor:</strong> {{ $order->kendaraan->plat_nomor }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <img src="{{ asset('storage/' . $order->kendaraan->foto) }}" class="img-fluid rounded"
                                        alt="{{ $order->kendaraan->merk }}" style="width: 100px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>






        <!-- Content Row -->
        <div class="row">

            <!-- Recent Orders Table -->
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pesanan Terbaru</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID Pesanan</th>
                                        <th>Pelanggan</th>
                                        <th>Kendaraan</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Selesai</th>
                                        <th>Status Pesanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentPesanan as $pesanan)
                                        <tr>
                                            <td>P{{ $pesanan->pesanan_id }}</td>
                                            <td class="text-capitalize">{{ $pesanan->users->nama }}</td>
                                            <td class="text-uppercase">{{ $pesanan->kendaraan->merk }}
                                                {{ $pesanan->kendaraan->tipe }}
                                                {{ $pesanan->kendaraan->tahun_produksi }}</td>
                                            <td>{{ $pesanan->waktu_mulai }}</td>
                                            <td>{{ $pesanan->waktu_selesai }}</td>
                                            <td>{{ $pesanan->status_pesanan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
