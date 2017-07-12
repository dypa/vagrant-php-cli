<?php

namespace Dypa\Vagrant\Command;

use Dypa\Vagrant\CommandInterface;

class Machines implements CommandInterface
{
    public function getCommand():string
    {
        return 'vagrant global-status';
    }

    public function getResult(array $lines):array
    {
        $array = [];

        foreach ($lines as $line) {
            $matches = null;
            if (preg_match('/([a-f0-9]{7})\s+.+\s+.+\s+([a-z]+)\s+(.*)/', $line, $matches)) {
                $id = $matches[1];
                $array[$id] = [
                    'id' => $id,
                    'state' => $matches[2],
                    'directory' => $matches[3],
                ];
            }
        }

        return $array;
    }
}
