<?php

declare(strict_types=1);

namespace Inquid\LaravelApiModelDriver\communicators;

/**
 * DTO to transfer data to the communicators that'll make the request.
 */
class CommunicatorRequest
{
    /** @var string $url */
    public string $url;

    /** @var array|null $urlParams */
    public ?array $urlParams = [];

    /** @var string $method */
    public string $method = 'GET';

    /** @var array|null $authorization */
    public ?array $authorization;

    /** @var array $headers */
    public array $headers = [];

    /** @var array|null $body */
    public ?array $body;

    /** @var array|null $configuration */
    public ?array $configuration;

    /**
     * @param string     $url
     * @param array|null $urlParams
     * @param string     $method
     * @param array|null $authorization
     * @param array      $headers
     * @param array|null $body
     * @param array|null $configuration
     */
    public function __construct(string $url,
                                ?array $urlParams,
                                string $method,
                                ?array $authorization,
                                array  $headers,
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
