<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('vendor')->user();

    //dd($users);

    return view('vendor.home');
})->name('home');

