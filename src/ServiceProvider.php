<?php

declare(strict_types=1);

namespace Inquid\LaravelApiModelDriver;

use Illuminate\Database\Connection as ConnectionBase;
use Illuminate\Support\ServiceProvider as ServiceProviderBase;
use Inquid\LaravelApiModelDriver\communicators\GuzzleCommunicator;

/**
 * Service provider to create the class connection.
 */
class ServiceProvider extends ServiceProviderBase
{
    /**
     * {@inheritDoc}
     */
    public function register()
    {
        ConnectionBase::resolverFor('laravel_api_model_driver', static function ($database, $prefix, $config) {
            if (app()->has(Connection::class)) {
                return app(Connection::class);
            }

            $guzzleCommunicator = new $config['communicator']($config['communicator_config']);

            return new Connection($guzzleCommunicator, $database, $prefix, $config);
        });
    }

    /**
     * @param array $config
     * @return Connection
     */
    protected function createSpannerConnection(array $config)
    {
        $authentication = $this->createAuthenticationRequest();

        return new Connection($config['instance'], $config['database'], $config['prefix'], $config, $authentication, $sessionPool);
    }
}
