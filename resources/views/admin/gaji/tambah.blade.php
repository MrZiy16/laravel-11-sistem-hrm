

<x-navbar-admin>


<div class="content-wrapper">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Gaji</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.gaji.store') }}" method="POST">
                @csrf
        
                <div class="form-group">
                    <label for="id_karyawan">Nama Karyawan</label>
                    <select class="form-control @error('id_karyawan') is-invalid @enderror" name="id_karyawan" id="id_karyawan">
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach ($gaji as $k)
                            <option value="{{ $k->id }}">{{ $k->name }}</option>
                        @endforeach
                    </select>
                    @error('id_karyawan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                   
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan">
                    <option value="">-- Pilih Jabatan --</option>
                    <option value="staff">Staff</option>
                    <option value="keamanan">Keamanan</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="jumlah_gaji">Jumlah Gaji</label>
                    <input type="number" class="form-control" name="jumlah_gaji" id="jumlah_gaji" placeholder="Masukkan jumlah gaji" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

</x-navbar-admin>