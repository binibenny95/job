<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\JobsController;
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
Route::get('/home', [UserController::class,'index'])->name('home');
Route::get('/jobs',[JobsController::class,'index'])->name('job.jobs');
Route::get('/jobs/detail/{id}',[JobsController::class,'detail'])->name('jobDetail');
Route::post('/save-job',[JobsController::class,'saveJob'])->name('saveJob');




// to list all jobs.
//Route::get('/jobs', [UserController::class,'listJobs'])->name('listJobs');


Route::group(['account'], function(){

    //Guest Route
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/account/register', [AccountController::class,'registration'])->name('account.registraion');
        Route::post('/account/process-register', [AccountController::class,'processRegistration'])->name('account.processRegistraion');
        Route::get('/account/login', [AccountController::class,'login'])->name('account.login'); 
        Route::post('/account/authenticate', [AccountController::class,'authenticate'])->name('account.authenticate');
    });


    // Authenticated routes
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/account/profile', [AccountController::class,'profile'])->name('account.profile');
        Route::get('/account/logout', [AccountController::class,'logout'])->name('account.logout'); 
    });

});
