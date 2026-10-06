<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswas = [
            [
                'nim' => '251011700008',
                'nama' => 'Ilham Pangestu',
                'prodi' => 'Sistem Informasi',
                'kampus' => 'Universitas Pamulang',
                'email' => 'ilhampangestu612@gmail.com',
                'status' => 'Aktif',
            ],
        ];

        foreach ($mahasiswas as $mahasiswa) {
            Mahasiswa::create($mahasiswa);
        }
    }
}