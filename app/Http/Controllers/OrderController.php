<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class OrderController extends Controller
{
    public function index($tableId)
    {
        $table = Table::findOrFail($tableId);
        $orders = $table->orders;
        return view('orders.index', compact('orders', 'table'));
    }

    // Metode lain seperti store() untuk menambahkan pesanan bisa ditambahkan di sini.
}
