<?php

declare(strict_types=1);

namespace App\Command;

use App\Message\RawText;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class SendRawTextCommand extends Command
{
    /**
     * @var MessageBusInterface
     */
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        parent::__construct();
        $this->messageBus = $messageBus;
    }

    protected function configure()
    {
        parent::configure();

        $this->setName('app:send-raw');

        $this->addArgument('raw-text', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $rawText = new RawText($input->getArgument('raw-text'));

        $this->messageBus->dispatch($rawText);

        $output->writeln('<info>SENT RAW TEXT</info>');

        return self::SUCCESS;
    }
}
