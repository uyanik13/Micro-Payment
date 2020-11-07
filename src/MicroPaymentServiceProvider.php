<?php

namespace DRO\MicroPayment;

use Illuminate\Support\ServiceProvider;

/**
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2020 DRO http://www.dijitalreklam.org
 * @author     Ogur UYANIK
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-3.txt    LGPL
 */
class MicroPaymentServiceProvider extends ServiceProvider
{
    protected $defer = false;

    protected $rules = [

    ];

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views','micro-payment');
        $this->publishes([
            __DIR__.'/config/micro-payment.php' => config_path('micro-payment.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('micro-payment', MicroPayment::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['micro-payment'];
    }
}
