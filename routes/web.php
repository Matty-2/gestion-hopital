<?php
use App\Http\Controllers\HomeController;
use App\Filament\Resources\EmployeeResource;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
   // return view('welcome');
//});



Route::get('/', [HomeController::class, 'index'])->name('home');
