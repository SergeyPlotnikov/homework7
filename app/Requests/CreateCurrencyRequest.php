<?php

namespace App\Requests;

class CreateCurrencyRequest
{
    private $name;

    function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}