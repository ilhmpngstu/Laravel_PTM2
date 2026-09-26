<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //
    
    public function index()
    {
        $mahasiswa = [
            "nim" => "251011700008",
            "nama" => "Ilham Pangestu",
            "prodi" => "Sistem Informasi",
            "kampus" => "Universitas Pamulang",
            "email" => "ilhampangestu612@gmail.com",
            "status" => "aktif",
        ];
           
        
        
        return view("page.profile", compact("mahasiswa"));
    }
}
