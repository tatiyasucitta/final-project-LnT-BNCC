<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FakturdetailController;
use App\Http\Controllers\FakturController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home',[ItemController::class, 'view']
// );
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Auth::routes();

// Route::get('/', [App\Http\Controllers\PegawaiController::class, 'index'])->name('pegawai');

// Route::middleware(['auth'])->group(function () {
//     // Define your protected routes here
//     Route::get('/pegawai', [App\Http\Controllers\PegawaiController::class, 'index'])->name('pegawai.index');
// });

// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login',[LoginController::class, 'logins'])->name('logined');


// Route::get('/register', [RegisterController::class, 'regist'])->name('register');
// Route::post('/registered',[RegisterController::class, 'creat']
//     )->name('registered');

Route::get('/', [HomeController::class, 'index']);

Auth::routes();
Route::middleware(['auth'])->group(function () {
    //     // Define your protected routes here
    Route::get('/dashboard', [ItemController::class, 'userviewpage'])->name('user');
    Route::post('/add-to-cart/{id}', [CartController::class, 'store'])->name('cart');
    Route::get('/faktur', [FakturController::class, 'createinvoice'])->name('faktur');
    Route::post('/faktur/create', [FakturdetailController::class, 'create'])->name('createfaktur');
    Route::get('/ordered', [FakturdetailController::class, 'index'])->name('ordered');

    Route::prefix('admin')->middleware(['isAdmin'])->group(function () {
        // Define your protected routes here
        Route::get('/home',[ItemController::class, 'view'])->name('home');
        Route::get('/addItems', [ItemController::class, 'create']
        )->name('add');
        Route::post('/itemsAdded',[ItemController::class, 'created']
        )->name('added');
        
        Route::get('/update/{id}', [ItemController::class,'update'])->name('update');
        Route::patch('/updated-item/{id}', [ItemController::class,'updated'])->name('updated');
        
        Route::delete('/delete/{id}', [ItemController::class,'delete'])->name('delete');
        
        Route::get('/createcategory',[CategoryController::class, 'create']
        )->name('cat');
        Route::post('/categorycreated',[CategoryController::class, 'store']
        )->name('cat2');
    });
    });


