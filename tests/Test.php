<?php

namespace Dypa\Vagrant\tests;

use Dypa\Vagrant\Command\Machines;
use Dypa\Vagrant\Command\Status;
use Dypa\Vagrant\Command\Version;
use Dypa\Vagrant\CommandInterface;
use Dypa\Vagrant\Provider;
use PHPUnit\Framework\TestCase as PHPUnit_Framework_TestCase;

class Test extends PHPUnit_Framework_TestCase
{
    public function testCommandInterface():void
    {
        $command = new Version();
        $this->assertInstanceOf(CommandInterface::class, $command);
    }

    public function testExecuteCommand():void
    {
        $provider = new Provider();
        $version = $provider->execute(new Version())['version'] ?? '0';
        $this->assertTrue(version_compare($version, '1.8.5', '>='));
    }

    public function testVagrantVersionCommand():void
    {
        $this->assertEquals(
            'vagrant -v',
            $this->bypassPrivateMethodGetCommandString([
                new Version(),
            ])
        );
    }

    public function testVagrantGlobalStatusCommand():void
    {
        $this->assertEquals(
            'vagrant global-status',
            $this->bypassPrivateMethodGetCommandString([
                new Machines(),
            ])
        );
    }

    public function testVagrantStatusCommand():void
    {
        $this->assertEquals(
            'vagrant status testhash',
            $this->bypassPrivateMethodGetCommandString([
                new Status('testhash'),
            ])
        );
    }

    private function bypassPrivateMethodGetCommandString(array $parameters): string
    {
        $provider = new Provider();
        $reflection = new \ReflectionClass(get_class($provider));
        $method = $reflection->getMethod('getCommandString');
        $method->setAccessible(true);

        return $method->invokeArgs($provider, $parameters);
    }
}
