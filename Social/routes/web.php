<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\HomeController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\skillsController;
use App\Http\Controllers\Backend\tagsController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'BackEnd', 'prefix' => 'admin'], function() {
    Route::get('/', [HomeController::class, 'index'])->name('adminHome');
    Route::get('/users', [\App\Http\Controllers\BackEnd\userController::class, 'index'])->name('users');
    Route::get('/user/create', [HomeController::class, 'create'])->name('user.create');
    Route::post('/user/store', [HomeController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [HomeController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [HomeController::class, 'delete'])->name('user.delete');

//=========categories========= //

    Route::get('/categories', [CategoriesController::class,'index'])->name('categories');
    Route::get('/category/create', [CategoriesController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoriesController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoriesController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoriesController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoriesController::class, 'delete'])->name('category.delete');


    //=========skills========= //

    Route::get('/skills', [skillsController::class,'index'])->name('skills');
    Route::get('/skill/create', [skillsController::class, 'create'])->name('skill.create');
    Route::post('/skill/store', [skillsController::class, 'store'])->name('skill.store');
    Route::get('/skill/edit/{id}', [skillsController::class, 'edit'])->name('skill.edit');
    Route::post('/skill/update/{id}', [skillsController::class, 'update'])->name('skill.update');
    Route::get('/skill/delete/{id}', [skillsController::class, 'delete'])->name('skill.delete');


    //=========tags========= //

    Route::get('/tags', [tagsController::class,'index'])->name('tags');
    Route::get('/tag/create', [tagsController::class, 'create'])->name('tag.create');
    Route::post('/tag/store', [tagsController::class, 'store'])->name('tag.store');
    Route::get('/tag/edit/{id}', [tagsController::class, 'edit'])->name('tag.edit');
    Route::post('/tag/update/{id}', [tagsController::class, 'update'])->name('tag.update');
    Route::get('/tag/delete/{id}', [tagsController::class, 'delete'])->name('tag.delete');

});
