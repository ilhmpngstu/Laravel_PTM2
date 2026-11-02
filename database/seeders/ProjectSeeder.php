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
                'title'       => 'Project Testing',
                'description' => 'Testing Project',
                'teknologi'   => 'Laravel',
                'image'       => 'project1.jpg',
                'status'      => 'archived',
            ],
            [
                'title'       => 'Sistem ERP Tes',
                'description' => 'Sistem ERP untuk perusahaan manufaktur yang mengintegrasikan berbagai fungsi bisnis seperti keuangan, produksi, dan manajemen persediaan.',
                'teknologi'   => 'PHP, Laravel',
                'image'       => 'project2.jpg',
                'status'      => 'active',
            ],
            [
                'title'       => 'Sistem HRIS',
                'description' => 'Sistem HRIS untuk mengelola data karyawan dan proses sumber daya manusia.',
                'teknologi'   => 'JavaScript, React',
                'image'       => 'project3.jpg',
                'status'      => 'active',
            ],
            [
                'title'       => 'Sistem SCM',
                'description' => 'Sistem SCM untuk mengelola rantai pasokan dan logistik perusahaan.',
                'teknologi'   => 'Python, Django',
                'image'       => 'project4.jpg',
                'status'      => 'active',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['title' => $project['title']],
                $project
            );
        }
    }
}
