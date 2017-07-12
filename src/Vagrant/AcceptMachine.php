<?php

namespace Dypa\Vagrant;

abstract class AcceptMachine implements AcceptMachineInterface
{
    private $machine;

    public function __construct(string $machine)
    {
        $this->machine = $machine;
    }

    public function getMachineHash():string
    {
        return $this->machine;
    }
}
