<?php

namespace MahdiAslami\Laravel\Env;

use Illuminate\Support\ServiceProvider as SupportServiceProvider;
use MahdiAslami\Laravel\Env\Commands\EnvGenerate;
use MahdiAslami\Laravel\Env\Commands\EnvUpdate;

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
                EnvGenerate::class,
                EnvUpdate::class,
            ]);
          }
    }
}
