<?php

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.home');
})->name('home');

Route::get('/about', function () {
    return view('page.about');
})->name('about');

Route::get('/profile', [MahasiswaController::class, 'index'])->name('profile');

// Frontend Projects (Both /projects and /project work)
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        $totalProjects = Project::count();
        $projectsSelesai = Project::whereIn('status', ['Selesai', 'active', 'Active'])->count();
        $projectsProses = Project::whereNotIn('status', ['Selesai', 'active', 'Active'])->count();
        $latestProjects = Project::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalProjects', 'projectsSelesai', 'projectsProses', 'latestProjects'));
    })->name('dashboard');

    // CRUD Projects (Plural matching video/screenshot: /admin/projects)
    Route::resource('projects', AdminProjectController::class);
    // Alias singular
    Route::resource('project', AdminProjectController::class);
});
