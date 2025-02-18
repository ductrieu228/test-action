<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $today = \Carbon\Carbon::now()
        ->settings(
            [
                'locale' => app()->getLocale(),
            ]
    );
    $dateMessage = $today->isoFormat('DD-MM-YYYY, HH:mm:ss');
    return view('welcome', [
        'date_message' => $dateMessage
    ]);
});
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});