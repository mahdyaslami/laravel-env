<?php

namespace MahdiAslami\Laravel\Env;

use Illuminate\Support\ServiceProvider as SupportServiceProvider;
use MahdiAslami\Laravel\Env\Commands\Generate;
use MahdiAslami\Laravel\Env\Commands\Update;

class ServiceProvider extends SupportServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Generate::class,
                Update::class,
            ]);
          }
    }
}
