<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\BiodataController;
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

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::view('register','register');
Route::post('register',[AuthController::class,'register']);
Route::post('emailVerify',[AuthController::class,'emailVerify']);
Route::post('login',[AuthController::class,'login']);
Route::get('user_logout',[AuthController::class,'user_logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
    Route::get('biodata',[BiodataController::class,'biodata']);
    Route::get('preview',[BiodataController::class,'preview']);
    Route::post('storePersonalDetails',[BiodataController::class,'storePersonalDetails']);
    Route::post('storeProfessionalDetails',[BiodataController::class,'storeProfessionalDetails']);
    Route::post('storeFamilyDetails',[BiodataController::class,'storeFamilyDetails']);
    Route::post('storeEducationDetails',[BiodataController::class,'storeEducationDetails']);
    Route::post('storeAddressDetails',[BiodataController::class,'storeAddressDetails']);
    Route::post('storeLandDetails',[BiodataController::class,'storeLandDetails']);
    Route::post('storeMaternalDetails',[BiodataController::class,'storeMaternalDetails']);
});


//user
Route::get('/', function () {
    return view('user.index');
})->name('user_index');
Route::post('enquiry',[EnquiryController::class,'enquiry']);
Route::get('trait',function(){
    $post=new Comment;
    $post->store();
});