<?php

namespace Codepotato\CashCalc\Services;

use Illuminate\Support\Collection;
use Codepotato\CashCalc\Data\Example;

class ExampleService extends Service
{
    public function all(): Collection
    {
        // $this->connector->request(new ExampleRequest, $this->getMockClient());
    }

    public function get(): Example
    {
        //
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
