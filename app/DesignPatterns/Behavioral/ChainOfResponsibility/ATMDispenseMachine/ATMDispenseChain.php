<?php

namespace App\DesignPatterns\Behavioral\ChainOfResponsibility\ATMDispenseMachine;

class ATMDispenseChain
{
    private DispenseChain $c1;

    public function __construct(array $billConfig)
    {
//        $this->c1 = new Dollar100Dispenser();
//        $c2 = new Dollar50Dispenser();
//        $c3 = new Dollar20Dispenser();
//        $c4 = new Dollar10Dispenser();
//
//        $this->c1->setNextChain($c2);
//        $c2->setNextChain($c3);
//        $c3->setNextChain($c4);

        // Dynamic bill denominations
        if (! empty($billConfig)) {
            $this->c1 = new BillHandler(array_shift($billConfig));
            $currentHandler = $this->c1;
            foreach ($billConfig as $denomination) {
                $nextHandler = new BillHandler($denomination);
                $currentHandler->setNextChain($nextHandler);
                $currentHandler = $nextHandler;
            }
        }
    }

    public function processRequest($amount): void
    {
        if ($amount % 10 !== 0) {
            echo "Amount should be in multiple of 10s" . PHP_EOL;
            return;
        }

        $this->c1->dispense(new Currency($amount));
    }
}
