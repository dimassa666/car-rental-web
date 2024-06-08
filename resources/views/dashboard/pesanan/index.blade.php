@extends('layout/admin')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Pesanan</h1>



    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Info pesanan</th>
                            <th>Nama</th>
                            <th>Waktu pesan</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($pesanan as $item)
                            <tr>
                                <td>PES{{ $item->pesanan_id }}</td>
                                <td class="text-uppercase text-truncate" style="max-width: 250px;">
                                    {{ $item->kendaraan->merk . ' ' . $item->kendaraan->tipe . ' ' . $item->kendaraan->tahun_produksi . ' ' . $item->kendaraan->transmisi . ' | ' . $item->kendaraan->plat_nomor }}
                                </td>
                                <td>{{ $item->users->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->isoFormat('D MMMM Y | HH:mm') }}
                                </td>
                                <td class="text-capitalize">{{ $item->status_pesanan }}</td>
                                <td>
                                    <a href="/dashboard/pesanan/{{ $item->pesanan_id }}"
                                        class="badge bg-info text-white">CEK</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
