<?php

Route::get('foo', 'FooController@foo');

Route::get('/', function(){
    return 'Home Page';
});

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

Route::resource('articles', 'ArticlesController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('bar', ['middleware' => 'manager', function(){
    return 'this page may only be viewed by managers.';
}]);