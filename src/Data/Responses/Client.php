<?php

namespace Codepotato\CashCalc\Data\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class Client extends DataTransferObject
{
    public int $id;

    public string $name;

    public array $clients;

    public array $adviser;

    public array $links;
}
