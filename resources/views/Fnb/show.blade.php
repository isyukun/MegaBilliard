<!-- resources/views/fnb/show.blade.php -->

@extends('layouts.app')

@section('title', $fnb->name)

@section('content')
    <div class="container">
        <h2>{{ $fnb->name }}</h2>
        <p>Harga: {{ $fnb->price }}</p>
        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
        <a href="{{ route('fnb.edit', $fnb->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('fnb.destroy', $fnb->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus FnB ini?')">Hapus</button>
        </form>
    </div>
@endsection
