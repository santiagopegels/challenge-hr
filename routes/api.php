<?php

use Illuminate\Support\Facades\Route;

Route::post('/trades', [
    'uses' => 'TradeController@store'
]);
