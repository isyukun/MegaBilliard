<!-- resources/views/billing/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Meja Billiard</h1>
        <p>Selamat datang di halaman Daftar Meja Billiard.</p>
        <p>Di sini Anda akan melihat detail setiap meja billiard yang tersedia.</p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Meja</th>
                        <th>Status</th>
                        <th>Detail</th>
                        <th>Aksi</th> <!-- Tambah kolom untuk aksi -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($tables as $index => $table)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $table->name }}</td>
                            <td>{{ $table->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                            <td>
                                @include('billing.detail', ['table' => $table])
                            </td>
                            <td>
                                <form action="{{ route('billing.stopout', $table->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin melakukan Stop Out pada meja ini?')">Stop Out</button>
                                </form>
                                @if ($table->is_active)
                                    <form action="{{ route('billing.disable', $table->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-warning" onclick="return confirm('Apakah Anda yakin ingin menonaktifkan meja ini?')">Nonaktifkan</button>
                                    </form>
                                @else
                                    <form action="{{ route('billing.enable', $table->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin mengaktifkan meja ini?')">Aktifkan</button>
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
