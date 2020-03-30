<?php

namespace Ahmeti\Form;

use Illuminate\Support\ServiceProvider;
use Ahmeti\Form\FormService;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/form.php' => config_path('form.php')
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/form.php', 'form');

        $this->app->singleton('formservice', function () {
            return new FormService;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['formservice'];
    }
}
