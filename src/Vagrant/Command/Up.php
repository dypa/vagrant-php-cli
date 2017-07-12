<?php

namespace Dypa\Vagrant\Command;

use Dypa\Vagrant\CommandInterface;
use Dypa\Vagrant\AcceptMachine;

class Up extends AcceptMachine implements CommandInterface
{
    public function getCommand(): string
    {
        return 'vagrant up';
    }

    public function getResult(array $lines):array
    {
        return $lines;
    }
}
