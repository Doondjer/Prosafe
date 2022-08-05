<?php

use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;
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



Route::get('/', function () {
    return view('home');
})->name('homepage');

Route::get('/cenovnik', [\App\Http\Controllers\FilesController::class, 'pricing'])->name('pdf.pricing');
Route::get('/katalog', [\App\Http\Controllers\FilesController::class, 'catalog'])->name('pdf.catalog');


Route::get('/proizvodi',  [\App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');


Route::get('/kategorija/{category}', [\App\Http\Controllers\CategoriesController::class, 'index'])->name('category.index');
Route::get('/proizvodi/{product}',  [\App\Http\Controllers\ProductsController::class, 'show'])->name('products.show');
Route::get('/stranice/{page}',  [\App\Http\Controllers\PagesController::class, 'show'])->name('pages.show');
Route::get('/kontakt',  [\App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');
Route::post('/kontakt',  [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');


Route::group(['prefix' => 'admin', 'middleware' => ['can:access-admin-area']], function() {

    Route::get('maintenance', [\App\Http\Controllers\AdminsController::class, 'maintenance'])->name('admin.maintenance');

    Route::post('shut/down', [\App\Http\Controllers\AdminsController::class, 'down'])->name('admin.maintenance.down');

    Route::get('bring/up', [\App\Http\Controllers\AdminsController::class, 'up'])->name('admin.maintenance.up');

    Route::get('/', [\App\Http\Controllers\AdminsController::class, 'home'])->name('admin_homepage');

    Route::resource('stranice', '\App\Http\Controllers\PagesController')->except(['show'])->parameters(['stranice' => 'page']);
    Route::resource('dozvole', '\App\Http\Controllers\PermissionsController')->except(['show'])->parameters(['dozvole' => 'permission']);
    Route::resource('uloge', '\App\Http\Controllers\RolesController')->except(['show'])->parameters(['uloge' => 'role']);
    Route::resource('proizvodi', '\App\Http\Controllers\AdminProductsController')->except(['show'])->parameters(['proizvodi' => 'product']);
    Route::resource('kategorije', '\App\Http\Controllers\CategoriesController')->except(['show'])->parameters(['kategorije' => 'category']);
    Route::resource('korisnici', '\App\Http\Controllers\UsersController')->parameters(['korisnici' => 'user']);

    Route::get('/proizvodi/{product}/slike', [\App\Http\Controllers\ProductImagesController::class, 'destroy'])->name('admin.product_images.destroy');


    Route::get('/konfiguracija', [\App\Http\Controllers\ConfigurationController::class, 'index'])->name('admin.configuration.index');
    Route::get('/konfiguracija/{section}', [\App\Http\Controllers\ConfigurationController::class, 'edit'])->name('admin.configuration.edit');
    Route::patch('/konfiguracija', [\App\Http\Controllers\ConfigurationController::class, 'update'])->name('admin.configuration.update');

    Route::get('phpinfo', [\App\Http\Controllers\AdminsController::class, 'phpinfo'])->name('admin.phpinfo');
    Route::get('sitemap', [\App\Http\Controllers\AdminsController::class, 'sitemap'])->name('admin.sitemap.show');
    Route::get('sitemap/update', [\App\Http\Controllers\AdminsController::class, 'sitemapUpdate'])->name('admin.sitemap.update');

});

