<?php

namespace App\DesignPatterns\Behavioral\ChainOfResponsibility\ATMDispenseMachine;

class Dollar50Dispenser implements DispenseChain
{
    private DispenseChain $chain;

    public function setNextChain(DispenseChain $chain): void
    {
        $this->chain = $chain;
    }

    public function dispense(Currency $currency): void
    {
        if ($currency->getAmount() >= 50) {
            $num = $currency->getAmount() / 50;
            $remainder = $currency->getAmount() % 50;
            echo "Dispensing " . floor($num) . " 50$ note" . PHP_EOL;

            if ($remainder !== 0) {
                $this->chain->dispense(new Currency($remainder));
            }
        } else {
            $this->chain->dispense($currency);
        }
    }
}
