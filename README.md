```
<?php

require_once __DIR__.'/vendor/autoload.php';

$command = new \Dypa\Vagrant\Provider();

$version = $command->execute(new \Dypa\Vagrant\Command\Version())['version'] ?? '0';
if (version_compare($version, '1.8.5', '<')) {
    throw new \Exception('Old vagrant');
}

var_dump($command->execute(new \Dypa\Vagrant\Command\Machines()));

//var_dump($command->execute(new \Dypa\Vagrant\Command\Status('273dcde')));

//var_dump($command->execute(new \Dypa\Vagrant\Command\Status('ba6e580')));
//var_dump($command->execute(new \Dypa\Vagrant\Command\Up('ba6e580')));
//var_dump($command->execute(new \Dypa\Vagrant\Command\Status('ba6e580')));
//var_dump($command->execute(new \Dypa\Vagrant\Command\Down('ba6e580')));
//var_dump($command->execute(new \Dypa\Vagrant\Command\Status('ba6e580')));
```