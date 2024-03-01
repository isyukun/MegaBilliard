<!-- resources/views/customer/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Pelanggan</h1>
        <a href="{{ route('customer.create') }}" class="btn btn-primary mb-3">Buat Akun Pelanggan Baru</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $index => $customer)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">Hapus</button>
                                </form>
                                @if ($customer->is_active)
                                    <form action="{{ route('customer.deactivate', $customer->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-warning" onclick="return confirm('Apakah Anda yakin ingin menonaktifkan pelanggan ini?')">Nonaktifkan</button>
                                    </form>
                                @else
                                    <form action="{{ route('customer.activate', $customer->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Aktifkan</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
