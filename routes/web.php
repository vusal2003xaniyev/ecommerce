<?php

use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Dashboard\dashboardController;
use App\Http\Controllers\Product\productController;
use App\Http\Controllers\Setting\settingController;
use App\Http\Controllers\Profile\profileController;
use Illuminate\Support\Facades\Artisan;
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

Route::middleware('isLogout')->group(function () {
    Route::controller(loginController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginPost')->name('loginPost');
    });
});

Route::middleware('isLogin')->group(function () {

    Route::controller(dashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::get('/linkstorage', function () {
		// Artisan::call('optimize:clear');
        Artisan::call('storage:link');
    });

    Route::controller(loginController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });

   

    Route::prefix('settings')->group(function () {
        Route::controller(settingController::class)->group(function () {
            Route::get('/general-data', 'generalDataIndex')->name('generalDataIndex');
            Route::get('/logo', 'logoIndex')->name('logoIndex');
            Route::post('/logo', 'logoEdit')->name('logoEdit');
            Route::post('/sosial-media', 'sosialMediaEdit')->name('sosialMediaEdit');
            Route::post('/contact-data', 'contactDataEdit')->name('contactDataEdit');
            Route::post('/seo-data', 'seoDataEdit')->name('seoDataEdit');
        });
    });

    

    Route::prefix('about')->group(function () {
        Route::controller(settingController::class)->group(function () {
            Route::get('/about-us', 'aboutUsIndex')->name('aboutUsIndex');
            Route::post('/about-us', 'aboutUsEdit')->name('aboutUsEdit');
        });
    });
    Route::prefix('product')->group(function () {
        Route::controller(productController::class)->group(function () {
            Route::get('/product', 'productIndex')->name('productIndex');
            Route::post('/product', 'productAddPost')->name('productAddPost');
            Route::get('/delete/{id}', 'productDelete');
            Route::post('/status-change', 'changeStatus');
            Route::post('/view-product', 'editView');
            Route::post('/view-order', 'orderView');

            Route::post('/product-edit', 'productEditPost')->name('productEditPost');
            Route::post('/product-order', 'productOrderPost')->name('productOrderPost');

        });
    });
   
  

    

   

    Route::prefix('profile')->group(function () {
        Route::controller(profileController::class)->group(function () {
            Route::get('/profile-index', 'profileIndex')->name('profileIndex');
            Route::post('/password-edit', 'passwordEdit')->name('passwordEdit');
        });
    });


    Route::middleware('admin')->group(function () {

        Route::prefix('profile')->group(function () {
            Route::controller(profileController::class)->group(function () {
                Route::get('/profile-index', 'profileIndex')->name('profileIndex');
                Route::post('/password-edit', 'passwordEdit')->name('passwordEdit');
                Route::post('/profile-status-change', 'profilechangeStatus')->name('profilechangeStatus');
                Route::get('/delete/{id}', 'profileDelete');
                Route::post('/profile-add', 'profileAdd')->name('profileAdd');
                Route::post('/profile-edit', 'profileEdit')->name('profileEdit');
                //Ajax
                Route::post('/profile-edit-index', 'profileView');
                Route::post('/status', 'profileStatus');
            });
        });

    });

});
