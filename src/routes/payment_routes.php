<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'api',
    'middleware' => [
        'micro-service'
    ]
], function () {

    Route::post('/payment-webhook', [\App\Http\Controllers\Payment\PaymentCallbackController::class, 'handleCallback']);
});
