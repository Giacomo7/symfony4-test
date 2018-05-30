<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Service\RandomGeneratorService;

class RandomGenerator extends Command
{
    private $rgs;
    public function __construct(RandomGeneratorService $rgs){
        parent::__construct();
        $this->rgs = $rgs;
    }

    protected function configure()
    {
        $this->setName("app:random-generator");
        $this->setDescription("Get a number between 1 and 100");
        $this->setHelp('This command allows you to Get a number between 1 and 100');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Random Number: " . $this->rgs->getRandom());
    }
}
