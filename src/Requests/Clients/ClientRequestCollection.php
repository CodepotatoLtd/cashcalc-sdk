<?php

namespace Codepotato\CashCalc\Requests\Clients;

use Codepotato\CashCalc\Responses\CashCalcResponse;
use Sammyjo20\Saloon\Http\RequestCollection;
use Sammyjo20\Saloon\Http\SaloonResponse;

class ClientRequestCollection extends RequestCollection
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
