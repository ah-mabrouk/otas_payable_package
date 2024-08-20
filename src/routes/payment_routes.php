<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => [
        'micro-service'
    ]
], function () {

    Route::post('/payment-webhook', [\App\Http\Controllers\Payment\PaymentCallbackController::class, 'handle']);
});
