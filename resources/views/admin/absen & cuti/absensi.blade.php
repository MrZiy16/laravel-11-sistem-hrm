<x-navbar-admin>
   

    <!-- resources/views/absensi/index.blade.php -->
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
            <h2>Data Absensi</h2>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Laporan Absensi
                </button>
                <div class=" dropdown-content" aria-labelledby="dropdownMenuButton">
                    
                    <a class="btn btn-primary dropdown-item" href="/admin/karyawan/absensi">Absensi</a>
                    <a class="btn btn-primary dropdown-item" href="/admin/absensi/laporan-bulanan">Laporan Bulanan</a>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Pulang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absensi as $absensi)
                        <tr>
                            <td>{{ $loop->iteration }}</td> 
                            <td>{{ $absensi->karyawan->name }}</td> <!-- Assuming a relationship with Karyawan -->
                            <td>{{ $absensi->tanggal }}</td>
                            <td>{{ $absensi->waktu_masuk }}</td>
                            <td>{{ $absensi->waktu_pulang }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-navbar-admin>