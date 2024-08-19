<?php

use Illuminate\Support\Facades\Route;
use Solutionplus\Payable\Http\Controllers\PaymentCallbackController;

Route::group([
    'middleware' => [
        'micro-service'
    ]
], function () {

    if (class_exists(\App\Http\Controllers\Payment\PaymentCallbackController::class)) {
        Route::post('/payment-webhook', [\App\Http\Controllers\Payment\PaymentCallbackController::class, 'handle']);
    } else {
        Route::post('/payment-webhook', [PaymentCallbackController::class, 'handle']);
    }
});
