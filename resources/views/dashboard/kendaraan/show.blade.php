@extends('layout/admin')

@section('konten')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Kendaraan</h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Kendaraan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $kendaraan->kategori }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis</th>
                                    <td>{{ $kendaraan->jenis }}</td>
                                </tr>
                                <tr>
                                    <th>Merk</th>
                                    <td>{{ $kendaraan->merk }}</td>
                                </tr>
                                <tr>
                                    <th>Tipe</th>
                                    <td>{{ $kendaraan->tipe }}</td>
                                </tr>
                                <tr>
                                    <th>Transmisi</th>
                                    <td>{{ $kendaraan->transmisi }}</td>
                                </tr>
                                <tr>
                                    <th>Tahun Produksi</th>
                                    <td>{{ $kendaraan->tahun_produksi }}</td>
                                </tr>
                                <tr>
                                    <th>Harga Sewa</th>
                                    <td>{{ $kendaraan->harga_sewa }}</td>
                                </tr>
                                <tr>
                                    <th>Plat Nomor</th>
                                    <td>{{ $kendaraan->plat_nomor }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $kendaraan->status }}</td>
                                </tr>
                                <tr>
                                    <th>Dibuat Pada</th>
                                    <td>{{ \Carbon\Carbon::parse($kendaraan->created_at)->locale('id')->isoFormat('D MMMM Y | HH:mm') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Diperbarui Pada</th>
                                    <td>{{ \Carbon\Carbon::parse($kendaraan->updated_at)->locale('id')->isoFormat('D MMMM Y | HH:mm') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Foto Kendaraan --}}

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gambar Kendaraan</h6>
                </div>
                <img src="{{ asset('storage/' . $kendaraan->foto) }}" alt="gambar mobil {{ $kendaraan->tipe }}"
                    class="rounded">
            </div>
        </div>
    </div>
@endsection
