<?php

namespace App\DesignPatterns\Behavioral\ChainOfResponsibility\ATMDispenseMachine;

class Currency
{
    private int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }
}
