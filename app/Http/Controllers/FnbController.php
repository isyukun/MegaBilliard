<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fnb;

class FnbController extends Controller
{
    // Menampilkan daftar semua FnB
    public function index()
    {
        $fnbs = Fnb::all();
        return view('fnb.index', compact('fnbs'));
    }

    // Menampilkan detail suatu FnB
    public function show($id)
    {
        $fnb = Fnb::findOrFail($id);
        return view('fnb.show', compact('fnb'));
    }

    // Menampilkan formulir untuk menambahkan FnB baru
    public function create()
    {
        return view('fnb.create');
    }

    // Menyimpan FnB baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable', // Izinkan deskripsi kosong
        ]);
        
        Fnb::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description ?? '', // Atau sesuaikan dengan cara yang sesuai.
        ]);        

        return redirect()->route('fnb.index')
            ->with('success', 'FnB berhasil ditambahkan.');
    }

    // Menampilkan formulir untuk mengedit FnB
    public function edit($id)
    {
        $fnb = Fnb::findOrFail($id);
        return view('fnb.edit', compact('fnb'));
    }

    // Menyimpan perubahan FnB ke database
    public function update(Request $request, Fnb $fnb)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable', // Izinkan deskripsi kosong
        ]);        

        $fnb->update($request->all());

        return redirect()->route('fnb.index')
            ->with('success', 'FnB berhasil diperbarui.');
    }

    // Menghapus FnB dari database
    public function destroy($id)
    {
        $fnb = Fnb::findOrFail($id);
        $fnb->delete();

        return redirect()->route('fnb.index')->with('success', 'FnB telah berhasil dihapus.');
    }
}
