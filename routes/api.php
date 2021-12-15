<?php

use Illuminate\Support\Facades\Route;

Route::post('/trades', [
    'uses' => 'TradeController@store'
]);

Route::get('/trades', [
    'uses' => 'TradeController@index'
]);

Route::get('/trades/{id}', [
    'uses' => 'TradeController@show'
]);
