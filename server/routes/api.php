<?php

use Illuminate\Http\Request;

Route::get('/test', function (Request $request) {
    return [
        'rrylee',
        'mark',
    ];
});
