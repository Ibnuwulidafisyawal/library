<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\App;

use function PHPUnit\Framework\returnSelf;
    
// use app\Http\Controllers\StudentController;
// use app\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('students', StudentController::class);
    // Route::get('/students/search', StudentController::class);

Route::resource('studentGroups', StudentGroupController::class);
Route::resource('rayons', RayonController::class);
Route::resource('publishers', PublisherController::class);
Route::resource('books', BookController::class);
Route::resource('borrowings', BorrowingController::class);  


require __DIR__.'/auth.php';
