<?php

namespace Codepotato\CashCalc\Requests;

use Codepotato\CashCalc\CashCalc;
use Sammyjo20\Saloon\Http\SaloonRequest;

class Request extends SaloonRequest
{
    /**
     * @var string|null
     */
    protected ?string $connector = CashCalc::class;
}
