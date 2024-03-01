<!-- resources/views/fnb/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit FnB')

@section('content')
    <div class="container">
        <h2>Edit FnB</h2>
        <form action="{{ route('fnb.update', $fnb->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama FnB:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $fnb->name }}">
            </div>
            <div class="form-group">
                <label for="price">Harga:</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $fnb->price }}">
            </div>
            <!-- Tambahkan input untuk atribut lainnya sesuai kebutuhan -->
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
