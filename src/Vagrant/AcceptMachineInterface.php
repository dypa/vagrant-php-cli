<?php

namespace Dypa\Vagrant;

interface AcceptMachineInterface
{
    public function __construct(string $machine);

    public function getMachineHash():string;
}
