<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

//Route::resources([
//    'news' => 'App\Http\Controllers\NewsController',
//]);

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/change-password',
        \App\Livewire\Profile\ChangePassword::class)->name('profile.change-password');
    Route::get('/profile/my-news', \App\Livewire\Profile\MyNews::class)->name('profile.my-news');
});

Route::get('/', \App\Livewire\News\NewsIndex::class)->name('news.index');
Route::get('/news/{id}', \App\Livewire\News\NewsShow::class)->name('news.show');
