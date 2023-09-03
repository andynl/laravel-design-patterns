<?php

namespace App\DesignPatterns\Behavioral\ChainOfResponsibility\ATMDispenseMachine;

class BillHandler implements DispenseChain
{
    private $denomination;
    private DispenseChain $chain;

    public function __construct($denomination)
    {
        $this->denomination = $denomination;
    }

    public function setNextChain(DispenseChain $chain): void
    {
        $this->chain = $chain;
    }

    public function dispense(Currency $currency): void
    {
        if ($currency->getAmount() >= $this->denomination) {
            $num = $currency->getAmount() / $this->denomination;
            $remainder = $currency->getAmount() % $this->denomination;
            echo "Dispensing " . floor($num) ." ". $this->denomination . "$ note" . PHP_EOL;

            if ($remainder !== 0) {
                $this->chain->dispense(new Currency($remainder));
            }
        } else {
            $this->chain->dispense($currency);
        }
    }
}
