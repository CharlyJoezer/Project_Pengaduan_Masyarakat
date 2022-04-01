<?php

namespace Database\Seeders;

use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Petugas::create([
            'nama_petugas' => 'ADMIN',
            'username' => 'ADMIN',
            'password' => Hash::make('12345'),
            'telp' => '082147813753'
        ]);

        // SEEDER INI TIDAK BISA DIPAKAI
        // Masyarakat::create([
        //     'nik' => '12345',
        //     'nama' => 'charly',
        //     'username' => 'charly',
        //     'password' => Hash::make('12345678'),
        //     'telp'  => '081234567890'
        // ]);
        // Pengaduan::create([
        //     'nik' => '129488125',
        //     'isi_laporan' => 'LAPORAN 1',
        //     ''
        // ]);
    }
}
