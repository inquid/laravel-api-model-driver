<?php

declare(strict_types=1);

namespace Inquid\LaravelApiModelDriver\communicators;

/**
 * DTO to transfer data to the communicators that'll make the request.
 */
class CommunicatorRequest
{
    /** @var string */
    public string $url;

    /** @var array|null */
    public ?array $urlParams = [];

    /** @var string */
    public string $method = 'GET';

    /** @var array|null */
    public ?array $authorization;

    /** @var array */
    public array $headers = [];

    /** @var array|null */
    public ?array $body;

    /** @var array|null */
    public ?array $configuration;

    /**
     * @param  string  $url
     * @param  array|null  $urlParams
     * @param  string  $method
     * @param  array|null  $authorization
     * @param  array  $headers
     * @param  array|null  $body
     * @param  array|null  $configuration
     */
    public function __construct(string $url,
                                ?array $urlParams,
                                string $method,
                                ?array $authorization,
                                array $headers,
                                ?array $body,
                                ?array $configuration)
    {
        $this->url = $url;
        $this->urlParams = $urlParams;
        $this->method = $method;
        $this->authorization = $authorization;
        $this->headers = $headers;
        $this->body = $body;
        $this->configuration = $configuration;
    }
}
