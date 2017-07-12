<?php

namespace Dypa\Vagrant\Command;

use Dypa\Vagrant\CommandInterface;

class Create implements CommandInterface
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
