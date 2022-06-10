<?php

namespace Codepotato\CashCalc\Responses;

use Sammyjo20\Saloon\Http\SaloonResponse;
use Codepotato\CashCalc\Exceptions\CashCalcRequestException;

class CashCalcResponse extends SaloonResponse
{
    /**
     * Create an exception if a server or client error occurred.
     *
     * @return CashCalcRequestException
     */
    public function toException(): CashCalcRequestException
    {
        if ($this->failed()) {
            $body = $this->response?->getBody()?->getContents();

            return new CashCalcRequestException($this, $body, 0, $this->getGuzzleException());
        }
    }
}
