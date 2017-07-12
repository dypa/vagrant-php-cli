<?php

namespace Dypa\Vagrant\Command;

use Dypa\Vagrant\CommandInterface;
use Dypa\Vagrant\AcceptMachine;

class Status extends AcceptMachine implements CommandInterface
{
    public function getCommand(): string
    {
        return 'vagrant status';
    }

    public function getResult(array $lines):array
    {
        return $lines;
    }
}
