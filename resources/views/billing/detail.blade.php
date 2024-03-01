<!-- resources/views/billing/detail.blade.php -->

<div>
    <strong>Nama Pelanggan:</strong> {{ $table->customer_name ?: '-' }} <br>
    <strong>Waktu Mulai:</strong> {{ $table->start_time ? $table->start_time->format('d-m-Y H:i') : '-' }} <br>
    <strong>Waktu Selesai:</strong> {{ $table->end_time ? $table->end_time->format('d-m-Y H:i') : '-' }} <br>
    <strong>Keterangan:</strong> {{ $table->description ?: '-' }} <br>
</div>
