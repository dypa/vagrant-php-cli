<?php

namespace Dypa\Vagrant\Command;

use Dypa\Vagrant\CommandInterface;
use Dypa\Vagrant\AcceptMachine;

class Destroy extends AcceptMachine implements CommandInterface
{
    public function getCommand(): string
    {
        return 'vagrant destroy --force';
    }

    public function getResult(array $lines):array
    {
        return $lines;
    }
}
