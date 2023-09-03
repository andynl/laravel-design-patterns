<?php

namespace App\DesignPatterns\Behavioral\ChainOfResponsibility\ATMDispenseMachine;

class Dollar10Dispenser implements DispenseChain
{
    private DispenseChain $chain;

    public function setNextChain(DispenseChain $chain): void
    {
        $this->chain = $chain;
    }

    public function dispense(Currency $currency): void
    {
        if ($currency->getAmount() >= 10) {
            $num = $currency->getAmount() / 10;
            $remainder = $currency->getAmount() % 10;
            echo "Dispensing " . floor($num) . " 10$ note" . PHP_EOL;

            if ($remainder !== 0) {
                $this->chain->dispense(new Currency($remainder));
            }
        } else {
            $this->chain->dispense($currency);
        }
    }
}
