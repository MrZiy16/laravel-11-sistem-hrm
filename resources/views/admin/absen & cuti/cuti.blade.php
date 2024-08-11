<x-navbar-admin>



    <!-- resources/views/cuti/index.blade.php -->
<div class="content-wrapper">
<nav class="navbar">
   <div class="navbar-left">

       <a href="/admin/karyawan/absensi" class="nav-item">Absen</a>
       <a href="/admin/karyawan/cuti" class="nav-item">Cuti</a>
</div>
        <div class="navbar-right">
            <a href="/profile" class="nav-item">👤 admin2</a>
        </div>
    </nav>
<div class="container">
    <h2>Data cuti</h2>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Cuti</th>
                <th>Nama Karyawan</th>
                <th>Tanggal Approve</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cuti as $cuti)
                <tr>
                    <td>{{ $cuti->id_approval }}</td>
                    <td>{{ $cuti->pengajuanCuti->jenisCuti->nama_jenis_cuti }}</td> <!-- Assuming a relationship with Karyawan -->
                    <td>{{ $cuti->karyawan->name }}</td>
                    <td>{{ $cuti->updated_at }}</td>
                    <td>

                        <form action=" {{ route('admin.absen & cuti.cuti.updateStatus', $cuti->id_approval) }}" method="POST">
                       
                            @csrf
                            @method('PUT')
                            <select name="status" id="status" class="form-control">
                                <option value="Disetujui" {{ $cuti->status == 'Disetujui' ? 'selected' : '' }}>Approve</option>
                                <option value="Ditolak" {{ $cuti->status == 'Ditolak' ? 'selected' : '' }}>Reject</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </td>
               
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

</x-navbar-admin>