@extends('layouts.app')

@section('title', 'Daftar Pesanan Meja ' . $table->name)

@section('content')
<div class="container">
    <h1>Daftar Pesanan Meja {{ $table->name }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->fnb->name }}</td>
                <td>{{ $order->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
