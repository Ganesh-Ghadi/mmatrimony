<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\CastesController;
use App\Http\Controllers\admin\CitiesController;
use App\Http\Controllers\admin\StatesController;
use App\Http\Controllers\admin\PackagesController;
use App\Http\Controllers\admin\ProfilesController;
use App\Http\Controllers\admin\subCastesController;
use App\Http\Controllers\admin\PermissionsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::group(['middleware' => ['guest']], function() {
        Route::get('/admin', function () {
            return view('admin.auth.login');
        });
   
});


    Route::group(['middleware' => ['auth', 'permission']], function() {
     
        Route::group(['prefix' => 'users', 'namespace' => 'admin'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/users/store', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/destroy', 'UsersController@destroy')->name('users.destroy');

        });

        Route::group(['namespace' => 'admin'], function() {
            Route::get('/user_profiles', 'ProfilesController@index')->name('user_profiles.index');
            Route::get('/user_profiles/{id}/edit', 'ProfilesController@edit')->name('user_profiles.edit');
            Route::delete('/user_profiles/{id}', 'ProfilesController@edit')->name('user_profiles.destroy');
        });


       
        Route::resource('castes', CastesController::class);
        Route::resource('sub_castes', subCastesController::class);
        Route::resource('packages', PackagesController::class);
        Route::resource('employees', EmployeesController::class);
        Route::resource('states', StatesController::class);
        Route::resource('cities', CitiesController::class);

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);


        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
      
       
              
    });


    Route::group(['middleware' => ['auth']], function() {
        Route::get('profile', 'ProfileController@index');
        Route::post('profile', 'ProfileController@changePassword')->name('profile.change');
        Route::get('profile/edit/{user}', 'ProfileController@edit')->name('profile.edit');
        Route::post('profile/{user}/update', 'ProfileController@update')->name('profile.update');

    });

    
});


require __DIR__.'/auth.php';