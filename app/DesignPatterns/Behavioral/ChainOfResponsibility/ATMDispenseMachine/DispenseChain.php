<?php

namespace App\DesignPatterns\Behavioral\ChainOfResponsibility\ATMDispenseMachine;

interface DispenseChain
{
    public function setNextChain(DispenseChain $chain);

    public function dispense(Currency $currency);
}
