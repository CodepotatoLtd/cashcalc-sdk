<?php

namespace Codepotato\CashCalc;

use Codepotato\CashCalc\Requests\Clients\ClientRequestCollection;
use Codepotato\CashCalc\Responses\CashCalcResponse;
use Codepotato\CashCalc\Services\ClientService;
use Sammyjo20\Saloon\Http\SaloonConnector;
use Sammyjo20\Saloon\Traits\Auth\RequiresTokenAuth;
use Sammyjo20\Saloon\Traits\Plugins\AcceptsJson;

/**
 * @method ClientRequestCollection clients
 */
class CashCalc extends SaloonConnector
{
    use AcceptsJson;
    use RequiresTokenAuth;

    /**
     * Define the base URL for the API
     *
     * @var string
     */
    protected string $apiBaseUrl = 'https://cashcalc.co.uk/api/v3.2';

    /**
     * Custom response that all requests will return.
     *
     * @var string|null
     */
    protected ?string $response = CashCalcResponse::class;

    /**
     * The requests on the SDK.
     *
     * @var array
     */
    protected array $requests = [
        'clients' => ClientRequestCollection::class,
    ];

    /**
     * Define the base URL of the API.
     *
     * @return string
     */
    public function defineBaseUrl(): string
    {
        return $this->apiBaseUrl;
    }

    /**
     * @param string|null $baseUrl
     */
    public function __construct(string $baseUrl = null)
    {
        if (isset($baseUrl)) {
            $this->apiBaseUrl = $baseUrl;
        }
    }
}
