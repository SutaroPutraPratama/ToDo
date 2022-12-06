<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\adminController;

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

// Route::get('/', function () {
//     // return view('welcome');
// });
//mengelompokan route-route yang akan diberi hak akses isguest
Route::middleware('isGuest')->group(function(){
    Route::get('/login', [TodoController::class,"index"]);
    Route::get('/register', [TodoController::class,"register"])->name('layout');
    Route::post('/login', [LoginController::class, "login"])->name('login-baru');
    Route::post('/register', [RegisterController::class,"register"])->name('register.create');
});


// Route::get('/home', function () {
//     return view('public/pages/home');
// });
// Route::get('/home/{}', [AlumniController::class, 'alumni']);
Route::get('/home', [adminController::class,"index"]);
// Route::get('/register',[RegisterController::class, "register"]);


// Route::get('/dashboard', function(){
//     return view('dashboard');
// })->middleware('isLogin');
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('isLogin')->group(function(){
    Route::get('/dashboard', [TodoController::class, 'dashboard'])->name('dashboard');
    Route::get('/create', [TodoController::class, 'create'])->name('create');
    Route::post('/store', [TodoController::class, 'store'])->name('store');
    Route::get('/data', [TodoController::class, 'data'])->name('data');
    //path yang ada dalam kurawa artinya path dinamis, path dinamis merupakan path yang datanya diisi dari database, path dinamis ini nantinya akan berubah-ubah tergantung data yang diberikan, apabila dalam routenya ada path dinamis maka nantinya data path dinamis ini dapat diakses oleh controller melalui parameter di functionnya
    //dalam satu route boleh lebih dari satu path dinamis
    Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');
    //method route buat update data ke database
    Route::patch('/update/{id}', [TodoController::class, 'update'])->name('update');
    //method route buat delete
    Route::delete('/destroy/{id}', [TodoController::class,'destroy'])->name('destroy');
    //untuk mengubah yang tadinya on procces menjadi selesai
    Route::patch('/complate/{id}', [TodoController::class, 'updateToComplate'])->name('update-complate');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//get untuk menampilkan halaman
//post untuk mengirim data
//
//