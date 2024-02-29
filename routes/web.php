<?php

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\dashboardcontroler;
use App\Http\Controllers\usercontroller;
use Faker\Guesser\Name;
use GuzzleHttp\Middleware;



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

Route::get('/', function () {
    return view('welcome');
});



Route::get('dashboard',[dashboardcontroler::class  , 'index'], function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// Route::get('/', )-> name('dashboard');
// // // // // // // // // // // // // // //:: dashboard ::// // // // // // // // //// // // // // // // // // // // // // //

Route :: group(['prefix' => 'ideas/' , 'as' =>'ideas.'] ,  function () {

Route::get('/{idea}', [ IdeaController::class, 'show'])-> name('show');

Route::get('/{idea}/edit', [ IdeaController::class, 'edit'])-> name('edit')->Middleware('auth');

Route::put('/{idea}', [ IdeaController::class, 'update'])-> name('update')->Middleware('auth');

Route::post('', [ IdeaController ::class, 'store'])-> name('create')->Middleware('auth');

Route::delete('/{idea}', [ IdeaController ::class, 'destroy'])-> name('destroy')->Middleware('auth');

Route::post('/{idea}/comments', [CommentController::class, 'store'])-> name('comments.store')->Middleware('auth');});

// // // // // // // // // // // // // //::: AUT :::// //  // // // // // // // // // // // // // // // // // // // // // // // //



Route::get('/register', [AuthController::class, 'register']) ->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login']) ->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout']) -> name('logout');

// // // // // // // // // // // // // // // //  // // // // // // // // // // // // // // // // // // // // // // //  //  // // //

Route :: resource ('users' , UserController::class)->only('show' , 'edit' , 'update') ->Middleware('auth');

Route:: get('profile' , [UserController::class, 'profile']) ->middleware('auth')->name('profile');

Route::get('/terms',function (){return view('terms');});

// In routes/web.php
Route::get('/profile/edit', function () {
    // Handle your profile edit logic here
    return view('profile.edit'); // Replace 'profile.edit' with your actual view name
  })->name('profile.edit');

