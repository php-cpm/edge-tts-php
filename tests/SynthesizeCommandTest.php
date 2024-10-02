<?php

namespace App\Tests;

use App\CLI\SynthesizeCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use PHPUnit\Framework\TestCase;

class SynthesizeCommandTest extends TestCase
{
    public function testExecuteWithValidText()
    {
        $command = new SynthesizeCommand();
        $commandTester = new CommandTester($command);

        // Ejecutar el comando
        $resultCode = $commandTester->execute([
            '--text' => 'Hello World',
            '--voice' => 'en-US-AriaNeural',
        ]);

        $this->assertSame(0, $resultCode);
        $this->assertStringContainsString('Audio file generated:', $commandTester->getDisplay());
    }

    public function testExecuteWithoutText()
    {
        $command = new SynthesizeCommand();
        $commandTester = new CommandTester($command);

        $resultCode = $commandTester->execute([]);

        $this->assertSame(1, $resultCode);
        $this->assertStringContainsString('Text is required', $commandTester->getDisplay());
    }
}
