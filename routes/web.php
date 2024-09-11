<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MatchResultController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UpcomingMatchController;
use App\Http\Controllers\HomeController as ControllersHomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/clear-cache', function () {
    $run = Artisan::call('config:clear');
    $run = Artisan::call('view:clear');
    $run = Artisan::call('cache:clear');
    $run = Artisan::call('config:cache');
    return 'FINISHED';
});

Route::get('/optimize-clear', function () {
    Artisan::call('optimize:clear');
    echo 'optimize clear completed';
});

Route::get('/link_storage', function () {
    Artisan::call('storage:link');
});


// Auth::routes();

Route::get('/', [ControllersHomeController::class, 'index'])->name('home');
Route::get('/membership', [ControllersHomeController::class, 'membership'])->name('membership');
Route::post('/membership-store', [ControllersHomeController::class, 'membershipStore'])->name('membershipStore');
Route::get('/update-captcha', [ControllersHomeController::class, 'updateImage']);

Route::get('/admin', function () {
    return redirect('admin/login');
});

Route::middleware('guest:admin')->group(function () {
    Route::get('admin/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('admin/login', [LoginController::class, 'store'])->name('admin.store');
});

Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::resource('team', TeamController::class);
    Route::resource('player', PlayerController::class);
    Route::resource('slider', SliderController::class);
    Route::post('save-stream', [SliderController::class, 'saveStream'])->name('saveStream');
    Route::resource('upcoming-match', UpcomingMatchController::class);
    Route::resource('match-result', MatchResultController::class);
});