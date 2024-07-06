<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth:web');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('traveling/about/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'about'])->name('traveling.about');

//Booking
Route::get('traveling/reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'makeReservations'])->name('traveling.reservation');
Route::post('traveling/reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'storeReservations'])->name('traveling.reservation.store');

//Payment
Route::get('traveling/pay', [App\Http\Controllers\Traveling\TravelingController::class, 'payWithPaypal'])->name('traveling.pay')->middleware('check.for.price');
Route::get('traveling/success', [App\Http\Controllers\Traveling\TravelingController::class, 'success'])->name('traveling.success')->middleware('check.for.price');

//deals
Route::get('traveling/deals', [App\Http\Controllers\Traveling\TravelingController::class, 'deals'])->name('traveling.deals');
Route::any('traveling/searchdeals', [App\Http\Controllers\Traveling\TravelingController::class, 'searchDeals'])->name('traveling.deals.search');

//user pages
Route::get('users/my-bookings', [App\Http\Controllers\Users\UsersController::class, 'bookings'])->name('user.bookings')->middleware('auth:web');

//admin pages
Route::get('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewlogin'])->name('view.login')->middleware('check.for.auth');
Route::post('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checklogin'])->name('check.login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    
    Route::get('/index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');

    //admins
    Route::get('/admins', [App\Http\Controllers\Admins\AdminsController::class, 'allAdmins'])->name('admins.all.admins');
    Route::get('/addadmins', [App\Http\Controllers\Admins\AdminsController::class, 'addadmins'])->name('admins.create');
    Route::post('/addadmins', [App\Http\Controllers\Admins\AdminsController::class, 'storeadmins'])->name('admins.store');

    //states
    Route::get('/allstates', [App\Http\Controllers\Admins\AdminsController::class, 'allstates'])->name('all.states');
    Route::get('/createstates', [App\Http\Controllers\Admins\AdminsController::class, 'createstates'])->name('create.states');
    Route::post('/createstates', [App\Http\Controllers\Admins\AdminsController::class, 'storestates'])->name('store.states');

    //bookings
    Route::get('/allbookings', [App\Http\Controllers\Admins\AdminsController::class, 'allBookings'])->name('all.bookings');
    Route::get('/editbookings/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editBookings'])->name('edit.bookings');
    Route::post('/updatebookings/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateBookings'])->name('update.bookings');
    Route::get('/deletebookings/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteBookings'])->name('delete.bookings');

});