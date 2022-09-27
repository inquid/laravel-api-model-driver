<?php

namespace Inquid\LaravelApiModelDriver;

use Illuminate\Database\Connection as ConnectionBase;
use Illuminate\Database\Grammar as GrammerBase;
use Inquid\LaravelApiModelDriver\communicators\Communicator;
use Inquid\LaravelApiModelDriver\communicators\CommunicatorRequest;

/**
 * Class to connect to an external service using Eloquent.
 */
class Connection extends ConnectionBase
{
    use UrlQueryBuilder;

    protected Communicator $communicator;

    public function __construct(Communicator $communicator, string $database, string $tablePrefix, array $config)
    {
        $this->communicator = $communicator;
        parent::__construct(null, $database, $tablePrefix, $config);
    }

    /**
     * @return GrammerBase
     */
    protected function getDefaultQueryGrammar()
    {
        $grammar = app(Grammar::class);
        $grammar->setConfig($this->getConfig());

        return $this->withTablePrefix($grammar);
    }

    /**
     * @param  string|false  $query E.g. /articles?status=published
     * @param  array  $bindings
     * @param  bool  $useReadPdo
     * @return array
     */
    public function select($query, $bindings = [], $useReadPdo = true)
    {
        if (! $query) {
            return [];
        }

        return $this->run($query, $bindings, function ($query) {
            $maxPerPage = $this->getConfig('default_params')['per_page'];
            $maxUrlLength = $this->getConfig('max_url_length') ?: 4000;
            $fullUrl = $this->getDatabaseName().$query;

            $communicationRequest = new CommunicatorRequest(
                $fullUrl,
                [],
                'GET',
                [],
                [],
                null,
                []
            );

            return $this->communicator->index($communicationRequest);
        });
    }

    public function insert($query, $bindings = [])
    {
        return true;
    }
}
