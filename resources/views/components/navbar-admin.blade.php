<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem HRM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
        }
        .wrapper {
            display: flex;
        }
        .main-sidebar {
            background-color: #2c3e50; 
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 240px;
            min-height: 100vh;
            padding-bottom: 60px;
            color: white;
        }
        .brand-link {
            background-color: #34495e;
            text-align: center;
            padding: 15px;
            font-size: 1.2em;
            font-weight: bold;
            color: #ecf0f1;
            text-decoration: none;
            display: block;
        }
        .nav-sidebar {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }
        .nav-sidebar .nav-item {
            display: block;
        }
        .nav-sidebar .nav-link {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: #ecf0f1;
            text-decoration: none;
            font-size: 1em;
        }
        .nav-sidebar .nav-link i {
            margin-right: 10px;
        }
        .nav-sidebar .nav-link.active {
            background-color: #3498db;
        }
        .nav-sidebar .nav-link:hover {
            background-color: #2980b9;
        }
      .content-wrapper {
    padding: 20px;
    margin-left: 240px; /* Sesuaikan dengan lebar sidebar */
    min-height: 100vh;
    width: 100%;
    background-color: #fff;
}
       
        .container h2 {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th,
        .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table th {
            background-color: #f8f9fa;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            font-size: 1em;
            color: #fff;
            background-color: #3498db;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #2980b9;
        }
        .mt-3 {
            margin-top: 1rem;
        }
        body {
 
.navbar {

    margin:0;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.navbar-brand {
    font-weight: bold;
    font-size: 1.2em;
}

.navbar-menu {
    display: flex;
    align-items: center;
}

.nav-item {
    text-decoration: none;
    color: #333;
    margin-left: 20px;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropbtn {
    background-color: #f8f9fa;
    color: #333;
    padding: 10px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.navbar-right {
    display: flex;
    align-items: center;
}
    </style>
</head>
<body>

<div class="wrapper">

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">Sistem HRM</a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav>
                <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                    <li class="nav-item">
                        <a href="/admin/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/karyawan" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Manajemen Karyawan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/karyawan/absensi" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Kehadiran & Cuti</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/karyawan/gaji" class="nav-link">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>Penggajian</p>
                        </a>
                    </li>
                
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>Rekrutmen</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/profile" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Pengaturan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="#"
                               onclick="event.preventDefault();
                                this.closest('form').submit();" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Log Out</p>
                            </a>
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
   {{ $slot }}
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

</body>
</html>
