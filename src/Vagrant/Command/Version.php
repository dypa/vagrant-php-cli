<?php

namespace Dypa\Vagrant\Command;

use Dypa\Vagrant\CommandInterface;

class Version implements CommandInterface
{
    public function getCommand():string
    {
        return 'vagrant -v';
    }

    public function getResult(array $lines):array
    {
        $version = [];

        foreach ($lines as $line) {
            //            if (preg_match('/^Installed Version: (.*)$/', $line, $matches)) {
//                $version = ['version' => $matches[1]];
//            }
            if (preg_match('/^Vagrant (.*)$/', $line, $matches)) {
                $version = ['version' => $matches[1]];
            }
        }

        return $version;
    }
}
