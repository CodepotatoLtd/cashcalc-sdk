<?php

namespace Codepotato\CashCalc\Services;

use Codepotato\CashCalc\Data\Example;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Codepotato\CashCalc\Responses\CashCalcResponse;
use Codepotato\CashCalc\Requests\Clients\ShowClientRequest;
use Codepotato\CashCalc\Requests\Clients\IndexClientsRequest;

class ClientService extends Service
{
    /**
     * Retrieve all clients.
     *
     * @return CashCalcResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonException
     */
    public function all(): CashCalcResponse
    {
        $request = $this->connector->request(new IndexClientsRequest);

        return $request->send();
    }

    /**
     * Retrieve an individual client.
     *
     * @param int $id
     * @return Example
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonException
     */
    public function get(int $id): SaloonResponse
    {
        $request = $this->connector->request(new ShowClientRequest($id));

        return $request->send();
    }

    public function update(): Example
    {
        //
    }

    public function delete(): Example
    {
        //
    }
}
