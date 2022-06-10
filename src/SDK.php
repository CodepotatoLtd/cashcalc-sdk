<?php

namespace Codepotato\SDK;

use Codepotato\SDK\Connectors\ApiConnector;
use Codepotato\SDK\Data\Config;
use Codepotato\SDK\Services\Service;
use Codepotato\SDK\Traits\AuthenticatesRequests;
use Codepotato\SDK\Traits\MocksRequests;
use Codepotato\SDK\Services\ExampleService;
use Sammyjo20\Saloon\Clients\MockClient;
use Sammyjo20\Saloon\Http\Auth\TokenAuthenticator;
use Codepotato\SDK\Exceptions\AuthenticationException;

/**
 * @property ExampleService example
 */
class SDK
{
    use MocksRequests;
    use AuthenticatesRequests;

    /**
     * Define the base URL for the API
     */
    public const API_BASE_URL = ':base_url';

    /**
     * The API connector used to make requests.
     *
     * @var ApiConnector
     */
    protected ApiConnector $apiConnector;

    /**
     * The SDK configuration.
     *
     * @var Config
     */
    protected Config $config;

    /**
     * Provide all your SDK services here...
     *
     * @var array
     */
    public static array $services = [
        'example' => ExampleService::class,
    ];

    /**
     * @param string|null $baseUrl
     */
    public function __construct(string $baseUrl = null)
    {
        $baseUrl ??= static::API_BASE_URL;

        $this->config = new Config($baseUrl);
        $this->apiConnector = new ApiConnector($this->config);
    }

    /**
     * Proxy a property call to a service.
     *
     * @param string $methodName
     * @return Service
     */
    public function __get(string $methodName): Service
    {
        return $this->apiConnector->{$methodName}();
    }
}
