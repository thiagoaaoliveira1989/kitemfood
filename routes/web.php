<?php

use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\PermissionProfileController;
use App\Http\Controllers\Admin\ACL\ProfileController;
use App\Http\Controllers\Admin\DetailPlanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController;


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

Route::prefix('admin')->group(function() 
{

  /**
     * Routes Permissions x Profiles
     */
    Route::get('profiles/{id}/permissions/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionsProfile'])->name('profiles.permissions.detach');
    Route::post('profiles/{id}/permissions', [PermissionProfileController::class, 'attachPermissionsProfile'])->name('profiles.permissions.attach');
    Route::any('profiles/{id}/permissions/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'permission'])->name('profiles.permissions');



    /**
     * Routes Permission
     */
    Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
    Route::resources([
        'permissions' => PermissionController::class
    ]);

    /**
     * Routes Profile
     */
    Route::any('profiles/search', [ProfileController::class, 'search'])->name('profile.search');
    Route::resources([
        'profiles' => ProfileController::class
    ]);
    
  
    /**
     * Routes Details Plan
     */
    Route::delete('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'destroy'])->name('plans.details.destroy');
    Route::put('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'update'])->name('plans.details.update');
    Route::get('plans/{url}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('plans.details.edit');
    Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('plans.details.store');
    Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('plans.details.create');
    Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('plans.details.index');


    /**
     * Routes Plan
     */
    Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');
    Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
    
    /**
     * Home Dashboard
     */
    Route::get('/', [PlanController::class, 'index'])->name('admin.index');
    
});



Route::get('/', function () {
    return view('welcome');
});
