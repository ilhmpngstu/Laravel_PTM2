<?php
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.home');
});

Route::get('/about', function () {
    return view('page.about');
});
Route::prefix('admin')->group(function (){
    Route::get('/', function(){
        return view('admin.template');

    })->name('admin.home');
});


route:: get('/profile', [MahasiswaController::class, 'index'])->name('profile');
route:: get('/project', [ProjectController::class, 'index'])->name('project.index');
route:: get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');


?>