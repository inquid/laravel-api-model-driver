<?php

declare(strict_types=1);

namespace Inquid\LaravelApiModelDriver\communicators;

/**
 * Interface to be implemented by the classes that will call the external service.
 *
 * E.g. Guzzle, Google Pub/Sub, Aws SQS ...
 */
interface Communicator
{
    /**
     * @param  CommunicatorRequest  $request
     * @return array
     */
    public function index(CommunicatorRequest $request): array;

    /**
     * @param  CommunicatorRequest  $request
     * @return bool
     */
    public function store(CommunicatorRequest $request): bool;

    /**
     * @param  CommunicatorRequest  $request
     * @return array
     */
    public function show(CommunicatorRequest $request): array;

    /**
     * @param  CommunicatorRequest  $request
     * @return bool
     */
    public function update(CommunicatorRequest $request): bool;

    /**
     * @param  CommunicatorRequest  $request
     * @return bool
     */
    public function destroy(CommunicatorRequest $request): bool;
}
