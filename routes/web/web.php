<?php
use App\Http\Controllers\AdminsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/{post}',[App\Http\Controllers\PostController::class, 'show'] )->name('blog.post');


Route::middleware([ 'auth'])->group(function(){

    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');

  
});

Route::middleware(['role:admin', 'auth'])->group(function(){
    Route::get('admin/users',[App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::delete('admin/users/{user}/destroy',[App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

    

});

