<?php

namespace App\Console\Commands;

use App\DesignPatterns\Behavioral\ChainOfResponsibility\ATMDispenseMachine\ATMDispenseChain;
use Illuminate\Console\Command;

class ATMDispense extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:atm-dispense';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $billConfig = [100, 50, 20, 10, 5];
        $atmDispenser = new ATMDispenseChain($billConfig);
        while (true) {
            $amount = $this->ask("Enter amount to dispense: ");
            $atmDispenser->processRequest((int)$amount);
        }
    }
}
