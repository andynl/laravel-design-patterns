<?php

namespace App\DesignPatterns\Behavioral\ChainOfResponsibility\ATMDispenseMachine;

class Dollar20Dispenser implements DispenseChain
{
    private DispenseChain $chain;

    public function setNextChain(DispenseChain $chain): void
    {
        $this->chain = $chain;
    }

    public function dispense(Currency $currency): void
    {
        if ($currency->getAmount() >= 20) {
            $num = $currency->getAmount() / 20;
            $remainder = $currency->getAmount() % 20;
            echo "Dispensing " . floor($num) . " 20$ note" . PHP_EOL;

            if ($remainder !== 0) {
                $this->chain->dispense(new Currency($remainder));
            }
        } else {
            $this->chain->dispense($currency);
        }
    }
}
