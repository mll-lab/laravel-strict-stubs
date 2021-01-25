<?php

namespace Tests;

use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Illuminate\Support\Facades\Storage;

class PublishTest extends TestCase
{
    public function testPublishStubs(): void
    {
        $config = app(ConfigRepository::class);
        $config->set('filesystems.disks.base', [
            'driver' => 'local',
            'root' => $this->app->basePath(),
        ]);

        $base = Storage::disk('base');
        $base->deleteDirectory('database/migrations');
        $base->deleteDirectory('stubs');

        /** @var \Illuminate\Testing\PendingCommand $pendingPublish */
        $pendingPublish = $this->artisan('vendor:publish --tag=strict-base');
        $pendingPublish
            ->assertExitCode(0)
            ->run();

        /** @var \Illuminate\Testing\PendingCommand $pendingMakeMigration */
        $pendingMakeMigration = $this->artisan('make:migration foo');
        $pendingMakeMigration
            ->assertExitCode(0)
            ->run();

        $migration = $base->get('stubs/migration.stub');
        self::assertStringContainsString(': void', $migration);

        $migrations = $base->files('database/migrations');
        self::assertCount(1, $migrations);

        $foo = $base->get($migrations[0]);
        self::assertStringContainsString(': void', $foo);
    }
}
