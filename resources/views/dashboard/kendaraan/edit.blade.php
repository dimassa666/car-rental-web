@extends('layout/admin')

@section('konten')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Kendaraan</h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Kendaraan</h6>
                </div>
                <div class="card-body">
                    <form action="/dashboard/kendaraan/{{ $kendaraan->kendaraan_id }}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                id="kategori" name="kategori" value="{{ old('kategori', $kendaraan->kategori) }}">
                            @error('kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis"
                                name="jenis" value="{{ old('jenis', $kendaraan->jenis) }}">
                            @error('jenis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk"
                                name="merk" value="{{ old('merk', $kendaraan->merk) }}">
                            @error('merk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tipe">Tipe</label>
                            <input type="text" class="form-control @error('tipe') is-invalid @enderror" id="tipe"
                                name="tipe" value="{{ old('tipe', $kendaraan->tipe) }}">
                            @error('tipe')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="transmisi">Transmisi</label>
                            <input type="text" class="form-control @error('transmisi') is-invalid @enderror"
                                id="transmisi" name="transmisi" value="{{ old('transmisi', $kendaraan->transmisi) }}">
                            @error('transmisi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tahun_produksi">Tahun Produksi</label>
                            <input type="text" class="form-control @error('tahun_produksi') is-invalid @enderror"
                                id="tahun_produksi" name="tahun_produksi"
                                value="{{ old('tahun_produksi', $kendaraan->tahun_produksi) }}">
                            @error('tahun_produksi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga_sewa">Harga Sewa</label>
                            <input type="number" class="form-control @error('harga_sewa') is-invalid @enderror"
                                id="harga_sewa" name="harga_sewa" value="{{ old('harga_sewa', $kendaraan->harga_sewa) }}">
                            @error('harga_sewa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="plat_nomor">Plat Nomor</label>
                            <input type="text" class="form-control @error('plat_nomor') is-invalid @enderror"
                                id="plat_nomor" name="plat_nomor" value="{{ old('plat_nomor', $kendaraan->plat_nomor) }}">
                            @error('plat_nomor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status"
                                name="status">
                                <option value="tersedia"
                                    {{ old('status', $kendaraan->status) === 'tersedia' ? 'selected' : '' }}>Tersedia
                                </option>
                                <option value="tidak"
                                    {{ old('status', $kendaraan->status) === 'tidak' ? 'selected' : '' }}>Tidak
                                    Tersedia
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
