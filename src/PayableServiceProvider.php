<?php

namespace Solutionplus\Payable;

use Illuminate\Support\ServiceProvider;
use Solutionplus\Payable\Console\Commands\PaymentSetupCommand;

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
        $this->loadRoutesFrom(__DIR__.'/routes/payment_routes.php');

        if ($this->app->runningInConsole()) {

            $this->commands([
                PaymentSetupCommand::class,
            ]);

            // Publish the controller
            $this->publishes([
                __DIR__.'/Http/Controllers/PaymentWebhookController.php' => app_path('Http/Controllers/Payment/PaymentWebhookController.php'),
            ], 'controllers');

        }
    }
}
