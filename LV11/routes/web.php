<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\RoleController;

use App\Http\Controllers\TerminateUserController;

use App\Http\Controllers\AgentUserController;

use App\Http\Controllers\Backend\PropertyTypeController;
use App\Models\User;

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

Route::get('/dashboard', function () {
    return view('user.user_dashboard');
})->middleware(['auth', 'verified'])->name('user.dashboard');

Route::middleware(['auth','role:user'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
    Route::get('/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');
    Route::get('/user/records', [UserController::class, 'UserRecords'])->name('user.records');
    

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//     Route::patch('/dashboard', [ProfileController::class, 'UserProfile'])->name('user.profile');

});

require __DIR__.'/auth.php';
//admin grp middleware
Route::middleware(['auth','role:admin'])->group(function () {
Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
Route::get('/agent/payment', [AdminController::class, 'AdminPayment'])->name('admin.payment');
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');


}); //end grp admin middleware

//agent grp middleware
Route::middleware(['auth','role:agent'])->group(function () {
Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
Route::get('/agent/logout', [AgentController::class, 'AgentLogout'])->name('agent.logout');
Route::get('/agent/profile', [AgentController::class, 'AgentProfile'])->name('agent.profile');
Route::post('/agent/profile/store', [AgentController::class, 'AgentProfileStore'])->name('agent.profile.store');
Route::get('/agent/change/password', [AgentController::class, 'AgentChangePassword'])->name('agent.change.password');
Route::post('/agent/update/password', [AgentController::class, 'AgentUpdatePassword'])->name('agent.update.password');


}); //end grp agent middleware

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login');

Route::get('/agent/users/search', [AgentUserController::class, 'AgentUserSearch'])->name('agent.users.search');;
Route::post('/agent/users/update', [AgentUserController::class, 'AgentUserUpdate'])->name('agent.users.update');;

// Define a route for the "Request Termination" button
Route::post('/termination/request',[TerminateUserController::class, 'requestTermination'])->name('termination.request');
// Define a route for the user profile page
Route::get('/terminate-user', [TerminateUserController::class, 'showUserProfile']);
// In your routes file
Route::get('/admin/users/{user}/profile', [AdminController::class,'showUserProfile'])->name('admin.users.profile');

//For Payment section
Route::post('/payment/callback', [PaymentController::class, 'handleGatewayCallback'])->name('payment.callback');



//Permision all route
Route::controller(RoleController::class)->group(function(){
    Route::get('/all/permission', 'AllPermission')->name('all.permission');
    Route::get('/add/permission', 'AddPermission')->name('add.permission');
    Route::get('/store/permission', 'StorePermission')->name('store.permission');
    Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');


});