<!-- resources/views/customer/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Buat Akun Pelanggan Baru</h1>
        <form method="POST" action="{{ route('customer.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <!-- Tambahkan input tambahan jika diperlukan -->
            <button type="submit" class="btn btn-primary">Buat Akun</button>
        </form>
    </div>
@endsection
