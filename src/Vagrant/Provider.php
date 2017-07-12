<?php

namespace Dypa\Vagrant;

class Provider
{
    private function getCommandString(CommandInterface $command): string
    {
        $commandString = $command->getCommand();
        if ($command instanceof AcceptMachineInterface) {
            $commandString .= ' '.$command->getMachineHash();
        }

        return $commandString;
    }

    public function execute(CommandInterface $command): array
    {
        return $command->getResult($this->executeCommand($this->getCommandString($command)));
    }

    private function executeCommand($command)
    {
        //linux or mac
        if (DIRECTORY_SEPARATOR === '/') {
            $command = 'LC_ALL=en_US.UTF-8 '.$command;
        }

        $command .= ' 2>&1';

        exec($command, $output, $returnValue);

        if ($returnValue !== 0) {
            throw new \RuntimeException(implode("\r\n", $output));
        }

        return $output;
    }
}
