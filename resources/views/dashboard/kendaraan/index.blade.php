@extends('layout/admin')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Kendaraan</h1>

    <a href="/dashboard/kendaraan/create" class="btn btn-primary mb-3">Tambah Kendaraan</a>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kendaraan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kendaraan</th>
                            <th>Gambar</th>
                            <th>Plat nomor</th>
                            <th>Harga sewa</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($kendaraan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-uppercase">{{ $item->merk }} {{ $item->tipe }}
                                    {{ $item->tahun_produksi }}
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="gambar mobil {{ $item->tipe }}"
                                        class="img-fluid rounded" style="max-width: 150px; height: auto;">
                                </td>
                                <td>{{ $item->plat_nomor }}</td>
                                <td>{{ $item->harga_sewa }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="/dashboard/kendaraan/{{ $item->kendaraan_id }}" class="badge bg-info"><i
                                            class="fas fa-eye text-white"></i></a>
                                    <a href="/dashboard/kendaraan/{{ $item->kendaraan_id }}/edit"
                                        class="badge bg-warning"><i class="fas fa-edit text-white"></i></a>
                                    <form action="/dashboard/kendaraan/{{ $item->kendaraan_id }}" method="post"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('Apakah data ingin dihapus?')">
                                            <i class="fas fa-ban text-white"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
