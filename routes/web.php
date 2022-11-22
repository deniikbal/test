<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CallbackController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



//STUDENT
Route::middleware(['auth'])->group(function () {
    //Home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //Student
    Route::post('createstudent',[App\Http\Controllers\Student\StudentController::class,'createstudent'])
    ->name('create.student');
    //Payment
    Route::get('payment/index', [App\Http\Controllers\Student\PaymentController::class,'payment'])->name('payment.index');
    Route::get('/payment', [App\Http\Controllers\Student\PaymentController::class,'create'])->name('payment.create');
    Route::post('/payment', [App\Http\Controllers\Student\PaymentController::class,'create_payment'])->name('payment');
});

Route::get('test',[TestController::class,'index'])->name('test');
Route::post('payments/midtrans-notification', [CallbackController::class, 'receive']);
Route::post('verifikasi/{id}', [CallbackController::class, 'verifikasi'])->name('verifikasi');

