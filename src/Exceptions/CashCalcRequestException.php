<?php

namespace Codepotato\CashCalc\Exceptions;

use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Exceptions\SaloonRequestException;

class CashCalcRequestException extends SaloonRequestException
{
    /**
     * Retrieve the response.
     *
     * @return SaloonResponse
     */
    public function getResponse(): SaloonResponse
    {
        return $this->getSaloonResponse();
    }
}
