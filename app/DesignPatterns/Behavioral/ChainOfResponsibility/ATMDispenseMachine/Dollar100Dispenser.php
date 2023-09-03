<?php

namespace App\DesignPatterns\Behavioral\ChainOfResponsibility\ATMDispenseMachine;

class Dollar100Dispenser implements DispenseChain
{
    private DispenseChain $chain;

    public function setNextChain(DispenseChain $chain): void
    {
        $this->chain = $chain;
    }

    public function dispense(Currency $currency): void
    {
        if ($currency->getAmount() >= 100) {
            $num = $currency->getAmount() / 100;
            $remainder = $currency->getAmount() % 100;
            echo "Dispensing " . floor($num) . " 100$ note" . PHP_EOL;

            if ($remainder !== 0) {
                $this->chain->dispense(new Currency($remainder));
            }
        } else {
            $this->chain->dispense($currency);
        }
    }
}
