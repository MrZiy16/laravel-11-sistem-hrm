<x-navbar-admin>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <h1>Tambah Karyawan Baru</h1>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.karyawan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
    <label for="nik">NIK</label>
    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="" required>
    @error('nik')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="alamat" class="form-control" id="alamat" name="alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                            </div>

                            <div class="form-group">
                                <label for="id_user">Email User</label>
                                <select class="form-control @error('id_user') is-invalid @enderror" id="id_user" name="id_user" required>
                                    <option value="">Pilih Email User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                                    @endforeach
                                </select>
                                @error('id_user')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                           

<div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status" required>
        <option value="">Pilih Status</option>
        <option value="1">Aktif</option>
        <option value="0">Non Aktif</option>
    </select>
</div>



                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin.karyawan') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-navbar-admin>