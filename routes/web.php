<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CastesController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\ChemistsController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\StockistsController;
use App\Http\Controllers\subCastesController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FreeSchemesController;
use App\Http\Controllers\TerritoriesController;
use App\Http\Controllers\GrantApprovalsController;
use App\Http\Controllers\QualificationsController;
use App\Http\Controllers\CustomerTrackingsController;
use App\Http\Controllers\RoiAccountabilityReportsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DoctorBusinessMonitoringsController;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
   

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::resource('dashboards', DashboardController::class)->middleware(['auth', 'verified']);

    Route::group(['middleware' => ['guest']], function() {
        Route::get('/test', [DashboardController::class, 'test'])->name('test');
        Route::get('/', function () {
            return view('auth.register');
        });
    });
   

    Route::group(['middleware' => ['auth', 'permission']], function() {
        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/users/store', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/destroy', 'UsersController@destroy')->name('users.destroy');
        });

        // search
        Route::get('search/products', 'ProductsController@search')->name('products.search');
       
        /**
         * Masters Route
         */
        Route::resource('castes', CastesController::class);
        Route::resource('sub_castes', subCastesController::class);
        Route::resource('packages', PackagesController::class);
        Route::resource('employees', EmployeesController::class);

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);


      
       
              
    });


    Route::group(['middleware' => ['auth']], function() {

        // Route::get('/basic_details', function () {
        //     return view('basic_details.create');
        // })->name('basic_details.create');
        Route::get('/basic_details', 'ProfilesController@basic_details')->name('basic_details.create');


        Route::get('profile', 'ProfileController@index');
        Route::post('profile', 'ProfileController@changePassword')->name('profile.change');
        Route::get('profile/edit/{user}', 'ProfileController@edit')->name('profile.edit');
        Route::post('profile/{user}/update', 'ProfileController@update')->name('profile.update');

    });

    
});


require __DIR__.'/auth.php';