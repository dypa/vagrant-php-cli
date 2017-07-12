<?php

namespace Dypa\Vagrant;

interface CommandInterface
{
    public function getCommand(): string;
    public function getResult(array $lines):array;
}
