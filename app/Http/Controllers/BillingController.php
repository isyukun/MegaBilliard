<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Fnb;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index(){
        $tables = Table::all();
        $fnbs = Fnb::all();
        return view('billing.index', compact('tables', 'fnbs'));
    }

    public function activateTable(Request $request, $id){
        $table = Table::findOrFail($id);
        $table->is_active = true;
        $table->save();

        return redirect()->back()->with('success', 'Table Activated Successfully');
    }

    public function deactivateTable(Request $request, $id){
        $table = Table::findOrFail($id);
        $table->is_active = false;
        $table->save();

        return redirect()->back()->with('success', 'Table Deactivated Successfully');
    }

    public function stopOut(Table $table)
    {
        // Reset detail pada meja
        $table->update([
            'customer_name' => null,
            'start_time' => null,
            'end_time' => null,
            'description' => null,
        ]);

        return redirect()->back()->with('success', 'Meja berhasil di-reset.');
    }
}
