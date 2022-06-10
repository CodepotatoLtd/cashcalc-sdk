<?php

namespace Codepotato\CashCalc\Requests\Clients;

use Sammyjo20\Saloon\Constants\Saloon;
use Codepotato\CashCalc\Requests\Request;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Codepotato\CashCalc\Data\Responses\Client;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;

class ShowClientRequest extends Request
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
        return '/clients/' . $this->id;
    }

    /**
     * @param int $id
     */
    public function __construct(protected int $id)
    {
        //
    }

    /**
     * @param SaloonResponse $response
     * @return mixed
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    protected function castToDto(SaloonResponse $response): mixed
    {
        return new Client($response->json('data.client'));
    }
}
