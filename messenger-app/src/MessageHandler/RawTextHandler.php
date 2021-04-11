<?php

declare(strict_types=1);

namespace App\MessageHandler;

use App\Message\RawText;
use App\Message\TextSlug;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class RawTextHandler implements MessageHandlerInterface
{
    /**
     * @var MessageBusInterface
     */
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function __invoke(RawText $message)
    {
        print microtime(true).' '.__CLASS__.' RECEIVED RAW: '.$message->getRawText().PHP_EOL;

        $textSlug = new TextSlug($this->slugify($message->getRawText()));
        $this->messageBus->dispatch($textSlug);

        print microtime(true).' '.__CLASS__.' SENT SLUG: '.$textSlug->getTextSlug().PHP_EOL.PHP_EOL;
    }

    private function slugify(string $rawText): string
    {
        return preg_replace('/[^a-z0-9]/', '-', strtolower($rawText));
    }
}
