<!-- resources/views/fnb/index.blade.php -->

@extends('layouts.app')

@section('title', 'Daftar FnB')

@section('content')
    <div class="container">
        <h2>Daftar FnB</h2>
        <a href="{{ route('fnb.create') }}" class="btn btn-primary mb-2">Tambah FnB</a>
        @if (count($fnbs) > 0)
            <ul class="list-group">
                @foreach ($fnbs as $fnb)
                    <li class="list-group-item">
                        <a href="{{ route('fnb.show', $fnb->id) }}">{{ $fnb->name }}</a>
                        <span class="float-right">{{ $fnb->price }}</span>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Tidak ada FnB yang tersedia.</p>
        @endif
    </div>
@endsection
