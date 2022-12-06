<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\JobController;

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
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('auth/google', [SocialController::class, 'googleRedirect']);

Route::get('auth/google/callback', [SocialController::class, 'googleCallback']);

Route::get('explore', [JobController::class, 'index']);

Route::get('company/login', function () {
    return view('auth_company.login', [
        'title' => 'Company Login'
    ]);
})->name('company.loginview');

Route::post('company/login', [CompaniesController::class, 'handleLogin'])->name('company.login');

Route::post('company/logout', [CompaniesController::class, 'logout'])->name('company.logout');

Route::get('job/{id}', [JobController::class, 'show'])->name('job.show');

Route::post('job/save/{id}/delete', [JobController::class, 'delete_saved'])->name('job.delete');

Route::post('job/apply/{id}/delete', [JobController::class, 'delete_applied'])->name('job.delete_applied');

Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', [SocialController::class, 'profile'])->name('profile')->middleware('auth');

    Route::post('profile', [SocialController::class, 'update'])->name('update');

    Route::post('job/save/{id}', [JobController::class, 'save'])->name('job.save');

    Route::get('savedjobs', [JobController::class, 'show_saved'])->name('job.saved');

    Route::get('appliedjobs', [JobController::class, 'show_applied'])->name('job.applied');

    Route::post('job/apply/{id}', [JobController::class, 'apply'])->name('job.apply');
});


Route::group(['middleware' => ['isAdmin']], function () {

    Route::get('company', [CompaniesController::class, 'index'])->name('company.index');

    Route::get('company/applicant/{id}', [JobController::class, 'applicants'])->name('job.applicant');

    Route::get('company/create', [CompaniesController::class, 'create'])->name('company.create');

    Route::post('company/create', [CompaniesController::class, 'store'])->name('company.store');

    Route::get('company/edit/{id}', [CompaniesController::class, 'edit'])->name('company.edit');

    Route::post('company/edit/{id}', [CompaniesController::class, 'update'])->name('company.update');

    Route::get('company/delete/{id}', [CompaniesController::class, 'delete'])->name('company.delete');
});

require __DIR__ . '/auth.php';
