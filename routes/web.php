<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\AnalyzesController;
use App\Http\Controllers\ReceiverController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NavigationController;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

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


Route::get('/device', [DeviceController::class, 'test'])->withoutMiddleware([StartSession::class,ShareErrorsFromSession::class,VerifyCsrfToken::class])->name('device');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','web'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //Route::get('/devices', function () {return Inertia::render('Devices/Devices');})->name('Devices');

    Route::get('/devices', [DeviceController::class, 'index'])->name('devices');

    Route::get('/raports', [AnalyzesController::class, 'index'])->name('raports');

    Route::get('/reportbug', [NavigationController::class, 'reportbug'])->name('reportbug');
    Route::post('/sendbug', [NavigationController::class, 'sendbug'])->name('sendbug');

    Route::get('device/info/{id}', [SensorController::class, 'index'])->name('deviceinfo');
    Route::post('/deviceadd', [DeviceController::class, 'store'])->name('deviceadd');

    Route::post('/receiveradd', [ReceiverController::class, 'store'])->name('receiveradd');

    Route::get('/receiveredit/{id}', [ReceiverController::class, 'update'])->name('receiverupdate');
    Route::post('/receiverupdate', [ReceiverController::class, 'edit'])->name('receiveredit');

    Route::get('/edittransmitter/{id}', [DeviceController::class, 'update'])->name('updatetransmitter');
    Route::post('/updatetransmitter', [DeviceController::class, 'edit'])->name('updatetransmitteredit');

    Route::post('/cameraadd', [CameraController::class, 'store'])->name('cameraadd');

    Route::get('/cameraedit/{camera}', [CameraController::class, 'update'])->name('cameraedit');
    Route::post('/updatecamera', [CameraController::class, 'edit'])->name('updatecamera');

    Route::get('/cameras', [CameraController::class, 'index'])->name('cameras');
    Route::get('camera/info/{camera}', [CameraController::class, 'camerainfo'])->name('camerainfo');

    Route::get('/timetables', [SettingsController::class, 'timetable'])->name('timetable');
    Route::get('/timetablesadd/{id?}', [SettingsController::class, 'timetableadd'])->name('timetableadd');
    Route::post('/timetables', [SettingsController::class, 'store'])->name('timetables');
    Route::post('/timetablesdelete/{id}', [SettingsController::class, 'delete'])->name('timetabledelete');
    Route::post('/change-locale', [SettingsController::class, 'changeLocale'])->name('changeLocale');

    // Testing endpoints
    // Route::get('/get-auth', [NavigationController::class, 'getAuth'])->name('getAuth');
    // Route::get('/sendpacket', [NavigationController::class, 'sendpacket'])->name('sendpacket');
     Route::get('/test', function(){
        return Inertia::render('Camera/Test');
     });
});


