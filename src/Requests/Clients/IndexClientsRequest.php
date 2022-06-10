<?php

namespace Codepotato\CashCalc\Requests\Clients;

use Sammyjo20\Saloon\Constants\Saloon;
use Codepotato\CashCalc\Requests\Request;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Codepotato\CashCalc\Data\Responses\Client;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;

class IndexClientsRequest extends Request
{
    use CastsToDto;

    /**
     * Define the method that the request will use.
     *
     * @var string|null
     */
    protected ?string $method = Saloon::GET;

    /**
     * @return string
     */
    public function defineEndpoint(): string
    {
        return '/clients';
    }

    /**
     * @param SaloonResponse $response
     * @return mixed
     */
    protected function castToDto(SaloonResponse $response): mixed
    {
        return $response->collect('data.clients')->map(fn (array $client) => new Client($client));
    }
}
