<?php

namespace Solutionplus\Payable;

use Illuminate\Support\ServiceProvider;

class PayableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        require_once __DIR__ . '/Helpers/PayableHelperFunctions.php';
    }
}
