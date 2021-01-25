<?php

namespace MLL\LaravelStrictStubs;

use Illuminate\Support\ServiceProvider;

class LaravelStrictStubsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/stubs' => $this->app->basePath('stubs'),
        ], ['strict-stubs']);
    }
}
