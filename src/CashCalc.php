<?php

namespace Codepotato\CashCalc;

use Codepotato\CashCalc\Connectors\ApiConnector;
use Codepotato\CashCalc\Data\Config;
use Codepotato\CashCalc\Services\Service;
use Codepotato\CashCalc\Traits\AuthenticatesRequests;
use Codepotato\CashCalc\Traits\MocksRequests;
use Codepotato\CashCalc\Services\ExampleService;
use Sammyjo20\Saloon\Clients\MockClient;
use Sammyjo20\Saloon\Http\Auth\TokenAuthenticator;
use Codepotato\CashCalc\Exceptions\AuthenticationException;

/**
 * @property ExampleService example
 */
class CashCalc
{
    use MocksRequests;
    use AuthenticatesRequests;

    /**
     * Define the base URL for the API
     */
    public const API_BASE_URL = 'https://cashcalc.co.uk';

    /**
     * The API connector used to make requests.
     *
     * @var ApiConnector
     */
    protected ApiConnector $apiConnector;

    /**
     * The CashCalc configuration.
     *
     * @var Config
     */
    protected Config $config;

    /**
     * Provide all your CashCalc services here...
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
