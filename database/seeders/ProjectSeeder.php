<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [[
                'title' => 'Sistem Akademik',
                'description' => 'Aplikasi berbasis pengolahan web untuk mahasiswa',
                'teknologi' => 'Larevel & Bootstrap',
                'image' => 'project1.jpg',
                'status' => 'selesai',
            ],
            [
                'title' => 'E-Commerce Example1',
                'description' => 'Aplikasi berbasis e-commerce',
                'teknologi' => 'FLutter',
                'image' => 'project2.jpg',
                'status' => 'selesai',
            ],
            [
                'title' => 'Example 3',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia, atque',
                'teknologi' => 'Larevel & Bootstrap',
                'image' => 'project3.jpg',
                'status' => 'selesai',
            ],
            [
                'title' => 'Example 4',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, ad?',
                'teknologi' => 'Larevel & Bootstrap',
                'image' => 'project4.jpg',
                'status' => 'selesai',
            ],
            [
                'title' => 'Example 5',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, eaque?',
                'teknologi' => 'Larevel & Bootstrap',
                'image' => 'project5.jpg',
                'status' => 'selesai',
            ],
             [
                 'title' => 'Example 6',
                'description' => 'Aplikasi berbasis pengolahan web untuk mahasiswa',
                'teknologi' => 'Larevel & Bootstrap',
                'image' => 'project6.jpg',
                'status' => 'selesai',
            ],
            [
                'title' => 'Example 7',
                'description' => 'Aplikasi berbasis e-commerce',
                'teknologi' => 'FLutter',
                'image' => 'project7.jpg',
                'status' => 'selesai',
            ],
            [
                'title' => 'Example 8',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia, atque',
                'teknologi' => 'Larevel & Bootstrap',
                'image' => 'project8.jpg',
                'status' => 'selesai',
            ],
            [
                'title' => 'Example 9',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, ad?',
                'teknologi' => 'Larevel & Bootstrap',
                'image' => 'project9.jpg',
                'status' => 'selesai',
            ],
            [
                'title' => 'Example 10',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, eaque?',
                'teknologi' => 'Larevel & Bootstrap',
                'image' => 'project10.jpg',
                'status' => 'selesai',
            ],
 
            
            // ... tambahkan data lainnya
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}