<?php

namespace Dypa\Vagrant\Command;

use Dypa\Vagrant\CommandInterface;
use Dypa\Vagrant\AcceptMachine;

class Down extends AcceptMachine implements CommandInterface
{
    public function getCommand(): string
    {
        return 'vagrant halt';
    }

    public function getResult(array $lines):array
    {
        return $lines;
    }
}
