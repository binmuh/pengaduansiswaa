<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Aspirasi;
use App\Models\Input_aspirasi;
use App\Models\Kategori;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

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
         //Input Data Kategori
         Kategori::create(
            [
                'ket_kategori' => 'Kebersihan'
            ]
        );
        Kategori::create(
            [
                'ket_kategori' => 'Keamanan'
            ]
        );
        Kategori::create(
            [
                'ket_kategori' => 'Fasilitas'
            ]
        );
        //Input Data Siswa
        Siswa::create([
            'id' => '1',
            'nis' => '20201120',
            'kelas' => 'XII TEL 10',
        ]);
        Siswa::create([
            'id' => '2',
            'nis' => '20203320',
            'kelas' => 'XII TEL 11',
        ]);
        Siswa::create([
            'id' => '3',
            'nis' => '20205520',
            'kelas' => 'XII TEL 12',
        ]);
        //input data admin
        Admin::create([
            'username' => 'admin',
            'password' => bcrypt('password'),
        ]);
    }
}