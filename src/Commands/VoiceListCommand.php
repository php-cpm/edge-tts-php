<?php

namespace Afaya\EdgeTTS\Commands;

use Afaya\EdgeTTS\Service\EdgeTTS;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @AsCommand(name="edge-tts:voice-list")
 */
class VoiceListCommand extends Command
{
    protected static $defaultName = 'edge-tts:voice-list';
    protected static $defaultDescription = 'Get the list of available voices';

    protected function configure(): void
    {
        $this->setDescription(self::$defaultDescription);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $webSocketService = new EdgeTTS();
        $voices = $webSocketService->getVoices();

        $output->writeln("Lista de voces disponibles:");
        foreach ($voices as $voice) {
            $output->writeln(" - {$voice['ShortName']}");
        }

        return Command::SUCCESS;
    }
}
