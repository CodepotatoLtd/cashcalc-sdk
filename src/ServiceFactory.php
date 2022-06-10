<?php

namespace Codepotato\CashCalc;

use Sammyjo20\Saloon\Clients\MockClient;
use Codepotato\CashCalc\Services\Service;
use Codepotato\CashCalc\Services\ExampleService;
use Sammyjo20\Saloon\Http\Auth\TokenAuthenticator;
use Codepotato\CashCalc\Exceptions\ServiceFactoryException;

class ServiceFactory
{
    /**
     * Service class map to map methods to service classes.
     *
     * @var array|string[]
     */
    protected array $classMap = [
        'example' => ExampleService::class,
    ];

    /**
     * Create a service from a service name.
     *
     * @param TokenAuthenticator $authenticator
     * @param string $service
     * @param MockClient|null $mockClient
     * @return Service
     * @throws ServiceFactoryException
     */
    public function createService(TokenAuthenticator $authenticator, string $service, ?MockClient $mockClient = null): Service
    {
        $serviceClass = $this->classMap[$service] ?? null;

        if (is_null($serviceClass)) {
            throw new ServiceFactoryException(sprintf('Unable to find the service with the name "%s".', $service));
        }

        return new $serviceClass($authenticator, $mockClient);
    }
}
