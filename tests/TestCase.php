<?php declare(strict_types=1);

namespace Tests;

use MLL\LaravelStrictStubs\LaravelStrictStubsServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * @return array<int, class-string<\Illuminate\Support\ServiceProvider>>
     */
    protected function getPackageProviders($app): array
    {
        return [
            LaravelStrictStubsServiceProvider::class,
        ];
    }
}
