@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Meja Billiard</h1>
        <p>Selamat datang di halaman Daftar Meja Billiard.</p>
        <p>Di sini Anda akan melihat detail setiap meja billiard yang tersedia.</p>
        <div class="row">
            @foreach($tables as $index => $table)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $table->name }}</h5>
                            <p class="card-text">Status: {{ $table->is_active ? 'Aktif' : 'Tidak Aktif' }}</p>
                            <p class="card-text">@include('billing.detail', ['table' => $table])</p>
                            <form action="{{ route('billing.stopout', $table->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Apakah Anda yakin ingin melakukan Stop Out pada meja ini?')">Stop Out</button>
                            </form>
                            @if ($table->is_active)
                                <form action="{{ route('billing.disable', $table->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-warning mr-2" onclick="return confirm('Apakah Anda yakin ingin menonaktifkan meja ini?')">Nonaktifkan</button>
                                </form>
                            @else
                                <form action="{{ route('billing.enable', $table->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success mr-2" onclick="return confirm('Apakah Anda yakin ingin mengaktifkan meja ini?')">Aktifkan</button>
                                </form>
                            @endif
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fnbModal{{ $table->id }}">
                                Pesan FnB
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="fnbModal{{ $table->id }}" tabindex="-1" role="dialog" aria-labelledby="fnbModalLabel{{ $table->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="fnbModalLabel{{ $table->id }}">Pesan FnB</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulir pemesanan FnB -->
                                <form id="fnbOrderForm{{ $table->id }}">
                                    <!-- Isi formulir di sini -->
                                    <div class="form-group">
                                        <label for="menuItem{{ $table->id }}">Menu Item</label>
                                        <select class="form-control" id="menuItem{{ $table->id }}" name="menuItem">
                                            <!-- Tampilkan pilihan menu FnB dari database -->
                                            @foreach($fnbs as $fnb)
                                                <option value="{{ $fnb->id }}">{{ $fnb->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity{{ $table->id }}">Quantity</label>
                                        <input type="number" class="form-control" id="quantity{{ $table->id }}" name="quantity">
                                    </div>
                                    <!-- Tambahkan input lainnya sesuai kebutuhan -->
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" onclick="submitFnBOrder('{{ $table->id }}')">Pesan</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function submitFnBOrder(tableId) {
            // Dapatkan data dari formulir
            let menuItemId = document.getElementById('menuItem' + tableId).value;
            let quantity = document.getElementById('quantity' + tableId).value;

            // Kirim data pesanan ke backend menggunakan Ajax
            $.ajax({
                url: "{{ route('fnb.order') }}",
                method: "POST",
                data: {
                    tableId: tableId,
                    menuItemId: menuItemId,
                    quantity: quantity,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Tampilkan pesan respons kepada pengguna
                    alert(response.message);
                    // Tutup modal setelah pesanan berhasil diproses
                    $('#fnbModal' + tableId).modal('hide');
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika terjadi
                    console.error(error);
                    alert('Terjadi kesalahan saat memproses pesanan.');
                }
            });
        }
    </script>
@endsection
