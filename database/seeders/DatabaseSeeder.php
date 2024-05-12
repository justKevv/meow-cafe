<?php

namespace Database\Seeders;

use App\Models\Meja;
use App\Models\Menu;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Pegawai::factory(3)->create();

        Menu::create([
            'nama' => 'Nasi Goreng Persia',
            'kategori'=> 'Makanan',
            'harga' => 18000
        ]);
        
        Menu::create([
            'nama' => 'Spaghetti Carbonara',
            'kategori'=> 'Makanan',
            'harga' => 18000
        ]);

        Menu::create([
            'nama' => 'Americano',
            'kategori'=> 'Minuman',
            'harga' => 12000
        ]);

        Menu::create([
            'nama' => 'Coffee Bear Lonceng',
            'kategori'=> 'Minuman',
            'harga' => 17000
        ]);
        
        

        Meja::factory(30)->create();
    }
}
