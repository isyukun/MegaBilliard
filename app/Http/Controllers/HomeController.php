<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table; // Import model Table

class HomeController extends Controller
{
    public function index()
    {
        $tables = Table::all(); // Ambil semua data meja dari model Table
        return view('home', compact('tables')); // Kirim data meja ke tampilan home.blade.php
    }
}
