<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\backend\PropertyTypeController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// admin group middleware
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePswd'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatPswd'])->name('admin.updat.password');
   

});// End group Admin Middleware


Route::middleware(['auth','role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');

});// End group Agent Middleware

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


// admin group middleware

Route::middleware(['auth','role:admin'])->group(function(){
    //PropertyTypeController
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/type','AllType')->name('all.type');
        Route::get('/add/type','AddType')->name('add.type');
        Route::post('/store/type','StoreType')->name('store.type');
        Route::get('/edit/type/{id}','EditType')->name('edit.type');
        Route::post('/update/type','UpdateType')->name('update.type');
        Route::get('/delete/type/{id}','DeleteType')->name('delete.type');
   
    });

     //All amenties routes
     Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/ameneties','AllAmenties')->name('all.ameneties');
        Route::get('/add/ameneties','AddAmenties')->name('add.ameneties');
        Route::post('/store/Amenties','StoreAmenties')->name('store.Amenties');
        Route::get('/edit/ameneties/{id}','EditAmenties')->name('edit.ameneties');
        Route::post('/update/ameneties','UpdateAmeneties')->name('update.ameneties');
        Route::get('/delete/ameneties/{id}','DeleteAmenties')->name('delete.ameneties');
   
    });

     //All Permissions routes
     Route::controller(RoleController::class)->group(function(){
        Route::get('/all/Permissions','AllPermissions')->name('all.Permissions');
        Route::get('/add/permissions','AddPermissions')->name('add.permissions');
        Route::post('/store/permissions','StorePermissions')->name('store.permissions');
        Route::get('/edit/permissions/{id}','EditPermissions')->name('edit.permissions');
        Route::post('/update/permissions','UpdatePermissions')->name('update.permissions');
        Route::get('/delete/permissions/{id}','DeletePermissions')->name('delete.permissions');
        Route::get('/import/Permissions','ImportPermissions')->name('import.Permissions');
        Route::get('/export','Export')->name('export');
        Route::post('/import','Import')->name('import');
    });

    //All Roles routes
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/roles','AllRoles')->name('all.roles');
        Route::get('/add/roles','AddRoles')->name('add.roles');
        Route::post('/store/roles','StoreRoles')->name('store.roles');
        Route::get('/edit/roles/{id}','EditRoles')->name('edit.roles');
        Route::post('/update/roles','UpdateRoles')->name('update.roles');
        Route::get('/delete/roles/{id}','DeleteRoles')->name('delete.roles');
      
        Route::get('/add/roles/permissions','AddRolesPermissions')->name('add.roles.permissions');
        Route::post('/store/roles/permissions','StoreRolesPermissions')->name('store.roles.permissions');
        Route::get('/all/roles/permissions','AllRolesPermissions')->name('all.roles.permissions');
        Route::get('/admin/edit/roles/{id}','AdminEditRoles')->name('admin.edit.roles');
         Route::post('/admin/roles/update/{id}','AdminUpdateRoles')->name('admin.roles.update');
    });
   

});// End admin Admin Middleware