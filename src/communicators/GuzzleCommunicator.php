<?php

declare(strict_types=1);

namespace Inquid\LaravelApiModelDriver\communicators;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 * Class that make the request to an API and handles the responses into PHP friendly types.
 */
class GuzzleCommunicator implements Communicator
{
    /** @var Client */
    protected Client $client;

    public function __construct(string $baseUri)
    {
        $this->client = new Client(['base_uri' => $baseUri]);
    }

    /**
     * {@inheritDoc}
     */
    public function index(CommunicatorRequest $request): array
    {
        $urlWithParams = $request->url;
        $params = $request->headers;

        /** @var Response $response */
        $response = $this->client->{$request->method}($urlWithParams, $params);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * {@inheritDoc}
     */
    public function store(CommunicatorRequest $request): bool
    {
        // TODO: Implement store() method.
    }

    /**
     * {@inheritDoc}
     */
    public function show(CommunicatorRequest $request): array
    {
        // TODO: Implement show() method.
    }

    /**
     * {@inheritDoc}
     */
    public function update(CommunicatorRequest $request): bool
    {
        // TODO: Implement update() method.
    }

    /**
     * {@inheritDoc}
     */
    public function destroy(CommunicatorRequest $request): bool
    {
        // TODO: Implement destroy() method.
    }
}
