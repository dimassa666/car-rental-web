@extends('layout/admin')

@section('konten')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pesanan</h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Pesanan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th>ID Pesanan</th>
                                    <td>PES{{ $pesanan->pesanan_id }}</td>
                                </tr>
                                <tr>
                                    <th>Waktu Mulai</th>
                                    <td>{{ $pesanan->waktu_mulai }}</td>
                                </tr>
                                <tr>
                                    <th>Waktu Selesai</th>
                                    <td>{{ $pesanan->waktu_selesai }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah Hari</th>
                                    <td>{{ $pesanan->jumlah_hari }}</td>
                                </tr>
                                <tr>
                                    <th>Status Pesanan</th>
                                    <td class="text-uppercase">{{ $pesanan->status_pesanan }}</td>
                                </tr>
                                <tr>
                                    <th>Sopir</th>
                                    <td>{{ $pesanan->sopir ? 'Ya' : 'Tidak' }}</td>
                                </tr>
                                <tr>
                                    <th>Pelanggan</th>
                                    <td>{{ $pesanan->users->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Kendaraan</th>
                                    <td class="text-uppercase">
                                        {{ $pesanan->kendaraan->merk . ' ' . $pesanan->kendaraan->tipe }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi Pengantaran</th>
                                    <td class="text-capitalize">{{ $pesanan->lepasKunci->lokasi_antar }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi Penjemputan</th>
                                    <td class="text-capitalize">{{ $pesanan->lepasKunci->lokasi_jemput }}</td>
                                </tr>
                                <tr>
                                    <th>Dibuat Pada</th>
                                    <td>{{ $pesanan->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- dtail pesanan -->
                    <h6 class="mt-4">Detail Pesanan</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th>Subtotal Kendaraan</th>
                                    <td>{{ $pesanan->detailPesanan->subtotal_kendaraan }}</td>
                                </tr>
                                <tr>
                                    <th>Subtotal Antar Jemput</th>
                                    <td>{{ $pesanan->detailPesanan->subtotal_antar_jemput }}</td>
                                </tr>
                                <tr>
                                    <th>Subtotal Sopir</th>
                                    <td>{{ $pesanan->detailPesanan->subtotal_sopir }}</td>
                                </tr>
                                <tr>
                                    <th>Potongan Voucher</th>
                                    <td>{{ $pesanan->detailPesanan->potongan_voucher }}</td>
                                </tr>
                                <tr>
                                    <th>Total Pembayaran</th>
                                    <td>{{ $pesanan->detailPesanan->total_pembayaran }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- card mobil --}}
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Kendaraan yang Dipesan</h6>
                </div>
                <img src="{{ asset('storage/' . $pesanan->kendaraan->foto) }}"
                    alt="gambar mobil {{ $pesanan->kendaraan->tipe }}" class="card-img">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th>Kendaraan</th>
                                    <td class="text-uppercase">
                                        {{ $pesanan->kendaraan->merk . ' ' . $pesanan->kendaraan->tipe . ' ' . $pesanan->kendaraan->tahun_produksi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Transmisi</th>
                                    <td class="text-capitalize">{{ $pesanan->kendaraan->transmisi }}</td>
                                </tr>
                                <tr>
                                    <th>Harga Sewa</th>
                                    <td>{{ $pesanan->kendaraan->harga_sewa }}</td>
                                </tr>
                                <tr>
                                    <th>Plat Nomor</th>
                                    <td class="text-uppercase">{{ $pesanan->kendaraan->plat_nomor }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- card mobil --}}

        <!-- Card Pembayaran -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pembayaran</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Metode</th>
                                    <th>Jumlah Dibayar</th>
                                    <th>Waktu Pembayaran</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Status Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">{{ $pesanan->pembayaran->metode }}</td>
                                    <td>{{ $pesanan->pembayaran->jumlah_sudah_dibayar }}</td>
                                    <td>{{ $pesanan->pembayaran->waktu_pembayaran }}</td>
                                    <td>
                                        @if ($pesanan->pembayaran->foto_pembayaran)
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#fotoPembayaranModal">
                                                Lihat Foto
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        <form
                                            action="{{ route('dashboard.pembayaran.update', $pesanan->pembayaran->pembayaran_id) }}"
                                            method="POST">
                                            @method('PUT')
                                            @csrf
                                            <select name="status_pembayaran" class="form-control">
                                                <option value="sudah"
                                                    {{ $pesanan->pembayaran->status_pembayaran == 'sudah' ? 'selected' : '' }}>
                                                    Belum terverifikasi</option>
                                                <option value="terverifikasi"
                                                    {{ $pesanan->pembayaran->status_pembayaran == 'terverifikasi' ? 'selected' : '' }}>
                                                    Terverifikasi</option>
                                            </select>
                                    </td>
                                    <td>
                                        <input type="hidden" name="karyawan_id" value="{{ auth()->user()->id }}">
                                        <button type="submit" class="btn btn-primary">Simpan Verifikasi</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="fotoPembayaranModal" tabindex="-1" role="dialog"
                                    aria-labelledby="fotoPembayaranModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="fotoPembayaranModalLabel">Foto Pembayaran</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('storage/' . $pesanan->pembayaran->foto_pembayaran) }}"
                                                    class="img-fluid" alt="Foto Pembayaran">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
