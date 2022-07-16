<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicalInformationController;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\EMTController;
use App\Http\Controllers\UsersController;

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

Route::get('/', [UsersController::class,'index']);





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => 'auth'], function() {

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "index"]);

    Route::name('admin.')->prefix('admin')->middleware('checkRole:admin')->group(function() {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('firstAid', FirstAidController::class);

    });

    Route::middleware('checkRole:user')->group(function() {
        
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('medical-info', MedicalInformationController::class);

    });


    Route::name('emt.')->prefix('emt')->middleware('checkRole:emt')->group(function() {
        
        Route::get('/dashboard', function () {
            return view('emt.dashboard');
        })->name('dashboard');

        Route::any('/findPatient',[EMTController::class, 'view'])->name('findPatient');


    });
});




require __DIR__.'/auth.php';
