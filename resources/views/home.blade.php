@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Halaman Home</h1>
    <p>Selamat datang di halaman Home.</p>
    <p>Di sini Anda dapat melihat informasi ketersediaan meja dan durasi selesai dari setiap meja billiard.</p>

    <div class="card">
        <div class="card-header">
            Informasi Meja
        </div>
        <div class="card-body">
            <div class="row">
                @php $chunkedTables = $tables->chunk(ceil($tables->count() / 3)); @endphp
                @foreach ($chunkedTables as $chunk)
                    <div class="col-md-4">
                        @foreach ($chunk as $table)
                            <p>
                                {{ $table->name }}:
                                @if ($table->is_active)
                                    Tersedia
                                @else
                                    Tidak Tersedia
                                @endif
                                @if ($table->end_time)
                                    - Selesai dalam {{ $table->end_time->diffForHumans() }}
                                @endif
                            </p>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
