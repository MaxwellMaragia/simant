
<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/storagelink', function () { $targetFolder = base_path().'/storage/app/public'; $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage'; symlink($targetFolder, $linkFolder); });
Route::get('/',[ \App\Http\Controllers\WebsiteController::class,'home'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/about-me', [App\Http\Controllers\WebsiteController::class, 'about']);

Route::resource('post', \App\Http\Controllers\PostController::class);
Route::resource('category', \App\Http\Controllers\CategoryController::class);
Route::resource('tag', \App\Http\Controllers\TagController::class);
Route::resource('settings', \App\Http\Controllers\SettingsController::class);
Route::resource('profile', \App\Http\Controllers\Profile::class);
Route::get('blog/{post}',[\App\Http\Controllers\WebsiteController::class,'post'])->name('post');
Route::get('confirm/{hash}',[\App\Http\Controllers\NewsletterController::class,'confirm']);
Route::get('unsubscribe/{hash}',[\App\Http\Controllers\NewsletterController::class,'unsubscribe']);
Route::get('blog/category/{category}',[\App\Http\Controllers\WebsiteController::class,'category'])->name('category');
Route::get('search',[\App\Http\Controllers\WebsiteController::class,'search'])->name('search');
Route::post('newsletter',[\App\Http\Controllers\NewsletterController::class,'subscribe']);

