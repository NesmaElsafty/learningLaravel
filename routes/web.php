<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;


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
    return view('home')->withoutMiddleware([EnsureTokenIsValid::class]);
;
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('products', ProductController::class);
Route::get('/products/{id}', [ProductController::class,'show']);

Route::resource('categories', CategoryController::class);
Route::resource('NativeAuth', NativeAuthController::class);

Route::resource('taxes', TaxesController::class);

Route::resource('users', UserController::class, ['except' => ['create', 'edit']]);

