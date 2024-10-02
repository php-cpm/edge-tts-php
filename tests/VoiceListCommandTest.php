<?php

namespace App\Tests;

use App\CLI\VoiceListCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use PHPUnit\Framework\TestCase;

class VoiceListCommandTest extends TestCase
{
    public function testExecute()
    {
        $command = new VoiceListCommand();
        $commandTester = new CommandTester($command);

        $resultCode = $commandTester->execute([]);

        $this->assertSame(0, $resultCode);
        $this->assertStringContainsString('en-US-AriaNeural', $commandTester->getDisplay());
    }
}
