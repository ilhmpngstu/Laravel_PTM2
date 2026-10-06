<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Sistem Informasi Arsip Digital',
                'description' => 'Aplikasi berbasis web untuk digitalisasi, pengarsipan surat masuk dan keluar, serta temu kembali dokumen cepat.',
                'teknologi' => 'Laravel & Tailwind CSS',
                'image' => 'project1.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'Portal E-Commerce Fashion & Aksesori',
                'description' => 'Platform toko online responsif dengan fitur katalog interaktif, keranjang belanja, dan integrasi payment gateway.',
                'teknologi' => 'Laravel & Bootstrap 5',
                'image' => 'project2.jpg',
                'status' => 'In Progress',
            ],
            [
                'title' => 'Sistem Rekomendasi Destinasi Wisata',
                'description' => 'Sistem pendukung keputusan pemilihan tempat wisata lokal menggunakan metode Simple Additive Weighting (SAW).',
                'teknologi' => 'PHP, MySQL & Leaflet JS',
                'image' => 'project3.jpg',
                'status' => 'Selesai',
            ],
            // ... tambahkan data lainnya
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}