<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('frontend.landing');

Auth::routes();


Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function (){

    // Users Routs
    Route::get('users', 'Users@index')->name('users.index');
    Route::get('users/create', 'Users@create')->name('users.create');
    Route::post('users/store', 'Users@store')->name('users.store');
    Route::get('users/edit/{id}', 'Users@edit')->name('users.edit');
    Route::put('users/update/{id}', 'Users@update')->name('users.update');
    Route::delete('users/destroy/{id}', 'Users@destroy')->name('users.destroy');

    // Categories Routs
    Route::get('categories', 'Categories@index')->name('categories.index');
    Route::get('categories/create', 'Categories@create')->name('categories.create');
    Route::post('categories/store', 'Categories@store')->name('categories.store');
    Route::get('categories/edit/{id}', 'Categories@edit')->name('categories.edit');
    Route::put('categories/update/{id}', 'Categories@update')->name('categories.update');
    Route::delete('categories/destroy/{id}', 'Categories@destroy')->name('categories.destroy');

    // Skills Routs
    Route::get('skills', 'Skills@index')->name('skills.index');
    Route::get('skills/create', 'Skills@create')->name('skills.create');
    Route::post('skills/store', 'Skills@store')->name('skills.store');
    Route::get('skills/edit/{id}', 'Skills@edit')->name('skills.edit');
    Route::put('skills/update/{id}', 'Skills@update')->name('skills.update');
    Route::delete('skills/destroy/{id}', 'Skills@destroy')->name('skills.destroy');

    // Tags Routs
    Route::get('tags', 'Tags@index')->name('tags.index');
    Route::get('tags/create', 'Tags@create')->name('tags.create');
    Route::post('tags/store', 'Tags@store')->name('tags.store');
    Route::get('tags/edit/{id}', 'Tags@edit')->name('tags.edit');
    Route::put('tags/update/{id}', 'Tags@update')->name('tags.update');
    Route::delete('tags/destroy/{id}', 'Tags@destroy')->name('tags.destroy');

    // Pages Routs
    Route::get('pages', 'Pages@index')->name('pages.index');
    Route::get('pages/create', 'Pages@create')->name('pages.create');
    Route::post('pages/store', 'Pages@store')->name('pages.store');
    Route::get('pages/edit/{id}', 'Pages@edit')->name('pages.edit');
    Route::put('pages/update/{id}', 'Pages@update')->name('pages.update');
    Route::delete('pages/destroy/{id}', 'Pages@destroy')->name('pages.destroy');

    // Videos Routs
    Route::get('videos', 'Videos@index')->name('videos.index');
    Route::get('videos/create', 'Videos@create')->name('videos.create');
    Route::post('videos/store', 'Videos@store')->name('videos.store');
    Route::get('videos/edit/{id}', 'Videos@edit')->name('videos.edit');
    Route::put('videos/update/{id}', 'Videos@update')->name('videos.update');
    Route::delete('videos/destroy/{id}', 'Videos@destroy')->name('videos.destroy');

    // Routs Comments
    Route::post('comments', 'Videos@commentStore')->name('comment.store');
    Route::get('comments/{id}', 'Videos@commentDelete')->name('comment.delete');
    Route::post('comments/{id}', 'Videos@commentUpdate')->name('comment.update');
});

Route::get('admin/dashboard', 'BackEnd\Home@index')->name('admin.dashboard');


   // Front End Routes
   Route::get('home', 'HomeController@index')->name('home');
   Route::get('category/{id}', 'HomeController@category')->name('front.category');
   Route::get('skill/{id}', 'HomeController@skill')->name('front.skill');
   Route::get('video/{id}', 'HomeController@video')->name('frontend.video');
   Route::get('tag/{id}', 'HomeController@tag')->name('front.tag');


   // Comments Routes
   Route::middleware('auth')->group(function (){
   Route::post('comments/update/{id}', 'HomeController@CommentUpdate')->name('front.update');
   Route::post('comments/store/{id}', 'HomeController@CommentStore')->name('front.store');

   // Messages Routes
   Route::get('contact-us', 'HomeController@messageStore')->name('contact.store');
   Route::get('messages', 'BackEnd\Messages@index')->name('messages.index');
   Route::get('messages/edit/{id}', 'BackEnd\Messages@edit')->name('messages.edit');
   Route::delete('messages/destroy/{id}', 'BackEnd\Messages@destroy')->name('messages.destroy');
   Route::post('messages/replay/{id}', 'BackEnd\Messages@replay')->name('message.replay');
});



