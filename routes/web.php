<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

// Public Frontend Routes
Route::get('/', function () {
    return view('page.home');
})->name('home');

Route::get('/about', function () {
    return view('page.about');
})->name('about');

Route::get('/profile', [MahasiswaController::class, 'index'])->name('profile');

// Frontend Projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');

// Admin Authentication Routes
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::match(['get', 'post'], '/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Protected Admin Routes (Require Auth)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', function () {
        $totalProjects = Project::count();
        $projectsSelesai = Project::whereIn('status', ['Selesai', 'active', 'Active'])->count();
        $projectsProses = Project::whereNotIn('status', ['Selesai', 'active', 'Active'])->count();
        $latestProjects = Project::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalProjects', 'projectsSelesai', 'projectsProses', 'latestProjects'));
    })->name('dashboard');

    Route::resource('projects', AdminProjectController::class);
    Route::resource('project', AdminProjectController::class);
});
