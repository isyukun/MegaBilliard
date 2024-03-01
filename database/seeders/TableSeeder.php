<?php

use Illuminate\Database\Seeder;
use App\Models\Table;

class TableSeeder extends Seeder
{
    public function run()
    {
        Table::create([
            'name' => 'Meja 1',
            'is_active' => false,
        ]);

        Table::create([
            'name' => 'Meja 2',
            'is_active' => true,
        ]);

        // Tambahkan data lainnya sesuai kebutuhan
    }
}
