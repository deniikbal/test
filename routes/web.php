<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
