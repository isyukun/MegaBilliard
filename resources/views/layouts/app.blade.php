<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Billing App')</title>
    <!-- Tautkan stylesheet dari CDN atau lokal -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Tautkan CSS kustom Anda jika diperlukan -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Atur lebar sidebar */
        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #343a40;
            padding-top: 50px; /* Biarkan ruang untuk navbar */
        }
        /* Atur konten agar tidak tertutup oleh sidebar */
        .content {
            margin-left: 250px; /* Sesuaikan dengan lebar sidebar */
            padding: 20px;
        }
        /* Atur agar konten informasi meja dan FnB terlihat di baris */
        .row {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <!-- Tambahkan gambar logo di sini -->
        <div class="text-center">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" style="width: 150px; padding: 5px;">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('billing.index') }}">List Meja Billiard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('customer.index') }}">Daftar Member</a>
            </li>
            <!-- Tambahkan item navigasi untuk FnB -->
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('fnb.index') }}">Menu FnB</a>
            </li>
            <!-- Tambahkan item navigasi untuk booking meja -->
            <li class="nav-item">
                {{-- <a class="nav-link text-light" href="{{ route('booking.index') }}">Booking Meja</a> --}}
            </li>
        </ul>
    </nav>

    <!-- Konten -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Tautkan script dari CDN atau lokal -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Tautkan script JS kustom Anda jika diperlukan -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
