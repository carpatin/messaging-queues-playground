<?php

declare(strict_types=1);

namespace App\MessageHandler;

use App\Message\TextSlug;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class TextSlugHandler implements MessageHandlerInterface
{
    public function __invoke(TextSlug $message)
    {
        print  microtime(true).' '.__CLASS__.' RECEIVED SLUG: '.$message->getTextSlug().PHP_EOL.PHP_EOL;
    }
}
