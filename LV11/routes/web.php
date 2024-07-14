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
use App\Http\Controllers\Backend\PluckerDetailsController;
use App\Http\Controllers\Backend\CollectionCenterController;

use App\Http\Controllers\Backend\FarmerDetailsController;
use App\Models\FarmerDetails;
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
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::get('/agent/payment', [AdminController::class, 'AdminPayment'])->name('admin.payment');
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
Route::get('/admin/weight', [AdminController::class, 'AdminWeight'])->name('admin.weight');



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



//Permision routes
Route::controller(RoleController::class)->group(function(){
    Route::get('/all/permission', 'AllPermission')->name('all.permissions');
    Route::get('/add/permission', 'AddPermission')->name('add.permission');
    Route::post('/store/permission', 'StorePermission')->name('store.permission');
    Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
    Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
    Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

    Route::get('/import/permission', 'ImportPermission')->name('import.permission');
    Route::get('/export', 'Export')->name('export');
    Route::post('/import', 'Import')->name('import');
});

//Role routes
Route::controller(RoleController::class)->group(function(){
    Route::get('/all/roles', 'AllRoles')->name('all.roles');
    Route::get('/add/roles', 'AddRoles')->name('add.roles');
    Route::post('/store/roles', 'StoreRoles')->name('store.roles');
    Route::get('/edit/roles/{id}', 'EditRoles')->name('edit.roles');
    Route::post('/update/roles', 'UpdateRoles')->name('update.roles');
    Route::get('/delete/roles/{id}', 'DeleteRoles')->name('delete.roles');

    Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
    Route::post('/store/roles/permission', 'StoreRolesPermission')->name('store.roles.permission');
    Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
    Route::get('/admin/edit/roles/{id}', 'AdminEditRoles')->name('admin.edit.roles');
    Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');



});

Route::controller(FarmerDetailsController::class)->group(function(){

    Route::get('/all/farmers', 'AllFarmers')->name('all.farmers');
    Route::get('/add/farmer', 'AddFarmer')->name('add.farmer');
    Route::post('/store/farmer', 'StoreFarmer')->name('store.farmer');
    Route::post('/update/farmer', 'UpdateFarmer')->name('update.farmer');
    Route::get('/edit/farmer/{id}', 'EditFarmer')->name('edit.farmer');
    Route::get('/delete/farmer/{id}', 'DeleteFarmer')->name('delete.farmer');

});

Route::controller(PluckerDetailsController::class)->group(function(){

    Route::get('/all/pluckers', 'AllPluckers')->name('all.pluckers');
    Route::get('/add/plucker', 'AddPlucker')->name('add.plucker');
    Route::post('/store/plucker', 'StorePlucker')->name('store.plucker');
    Route::post('/update/plucker', 'UpdatePlucker')->name('update.plucker');
    Route::get('/edit/plucker/{id}', 'EditPlucker')->name('edit.plucker');
    Route::get('/delete/plucker/{id}', 'DeletePlucker')->name('delete.plucker');

});

Route::controller(CollectionCenterController::class)->group(function(){

    Route::get('/all/collections', 'AllCollections')->name('all.collections');
    Route::get('/add/collections', 'AddCollections')->name('add.collections');
    Route::POST('/store/collections', 'StoreCollections')->name('store.collections');
    Route::post('/update/collections', 'UpdateCollections')->name('update.collections');
    Route::get('/edit/collections/{id}', 'EditCollections')->name('edit.collections');
    Route::get('/delete/collections/{id}', 'DeleteCollections')->name('delete.collections');

});


