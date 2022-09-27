<?php

declare(strict_types=1);

namespace Inquid\LaravelApiModelDriver\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Inquid\LaravelApiModelDriver\ServiceProvider as LaravelApiModelDriverServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn(string $modelName) => 'Inquid\\LaravelApiModelDriver\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            LaravelApiModelDriverServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        //config()->set('database.default', 'api_1_connection');
        $dbConfig = require __DIR__.'/config.php';
        $app['config']->set('database', $dbConfig);

        /*
        $migration = include __DIR__.'/../database/migrations/create_skeleton_table.php.stub';
        $migration->up();
        */
    }
}
