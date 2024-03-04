<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//Route::get('/', function () {
   // return view('welcome');
//});
// to get all users.
Route::get('/', [UserController::class,'index'])->name('home');
Route::get('/account/register', [AccountController::class,'registration'])->name('account.registraion');
Route::post('/account/process-register', [AccountController::class,'processRegistration'])->name('account.processRegistraion');
Route::get('/account/login', [AccountController::class,'login'])->name('account.login');

// to list all jobs.
//Route::get('/jobs', [UserController::class,'listJobs'])->name('listJobs');
