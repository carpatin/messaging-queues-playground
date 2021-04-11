<?php

declare(strict_types=1);

namespace App\Message;

class RawText
{
    /**
     * @var string
     */
    private $rawText;

    public function __construct(string $rawText)
    {
        $this->rawText = $rawText;
    }

    public function getRawText(): string
    {
        return $this->rawText;
    }
}
