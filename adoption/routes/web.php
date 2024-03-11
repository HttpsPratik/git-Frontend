<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FavouritesController;
use App\Http\Controllers\ListingsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\TransactionsController;
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

Route::get('/dashboard', function () {
    return view('Dashboard.pages.dashboard');
});
//error page
Route::get('/errors', function () {
    return view('dashboard.pages.errors');
});

//Users:
Route::get('/users',[UsersController::class, 'index']);
Route::post('/users/save',[UsersController::class, 'store']);
Route::post('/users/update',[UsersController::class, 'update']);
Route::get('/users/delete/{users_id}',[UsersController::class, 'destroy']);



//Listings:
Route::get('/listings',[ListingsController::class, 'index']);
Route::post('/listings/save',[ListingsController::class, 'store']);
Route::post('/listings/update',[ListingsController::class, 'update']);
Route::get('/listings/delete/{listings_id}',[ListingsController::class, 'destroy']);

//Messages:
Route::get('/messages',[MessagesController::class, 'index']);
Route::post('/messages/save',[MessagesController::class, 'store']);
Route::post('/messages/update',[MessagesController::class, 'update']);
Route::get('/messages/delete/{messages_id}',[MessagesController::class, 'destroy']);

//Favourites:
Route::get('/favourites',[FavouritesController::class, 'index']);
Route::post('/favourites/save',[FavouritesController::class, 'store']);
Route::post('/favourites/update',[FavouritesController::class, 'update']);
Route::get('/favourites/delete/{favourites_id}',[FavouritesController::class, 'destroy']);

//Reviews
Route::get('/reviews', [ReviewsController::class, 'index']);
Route::post('/reviews/save', [ReviewsController::class, 'store']);
Route::post('/reviews/update', [ReviewsController::class, 'update']);
Route::get('/reviews/delete/{reviews_id}', [ReviewsController::class, 'destroy']);

//Transactions:
Route::get('/transactions', [TransactionsController::class, 'index']);
Route::post('/transactions/save', [TransactionsController::class, 'store']);
Route::post('/transactions/update', [TransactionsController::class, 'update']);
Route::get('/transactions/delete/{transactions_id}', [TransactionsController::class, 'destroy']);



