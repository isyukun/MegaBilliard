<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:8',
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('customer.index')->with('success', 'Akun pelanggan berhasil dibuat.');
    }

    public function activate($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update(['is_active' => true]);
        return redirect()->route('customer.index')->with('success', 'Pelanggan berhasil diaktifkan.');
    }

    public function deactivate($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update(['is_active' => false]);
        return redirect()->route('customer.index')->with('success', 'Pelanggan berhasil dinonaktifkan.');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
