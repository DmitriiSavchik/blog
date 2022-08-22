<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscribeController;

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

Route::group([
    'namespace' => 'App\Http\Controllers',
], function () {
    Route::get('/blog/category/{slug?}', 'BlogController@category')->name('category');
    Route::get('/blog/article/{slug?}', 'BlogController@article')->name('article');
});

Route::get('/', function () {
    return view('blog.home');
});

Auth::routes();

Route::group([
  'prefix' => 'admin',
  'namespace' => 'App\Http\Controllers\Admin',
  'middleware' => ['auth']
], function () {
   Route::get('/', 'DashboardController@dashboard')->name('admin.index');
   Route::resource('category', 'CategoryController', ['as' => 'admin']);
   Route::resource('article', 'ArticleController', ['as' => 'admin']);

   Route::group([
       'prefix' => 'user_management',
       'namespace' => 'UserManagement',
   ], function() {
       Route::resource('user', 'UserController', ['as' => 'admin.user_management']);
   });
});
Route::post("/subscribe", [SubscribeController::class, "subscribe"])->name("subscribe");
Route::get("verify/{token}", [SubscribeController::class, "verify"])->name("verify");

Route::get('/weather', function (){
    return view('weather.index');
});
