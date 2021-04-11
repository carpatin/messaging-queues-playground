<?php

declare(strict_types=1);

namespace App\Message;

class TextSlug
{
    /**
     * @var string
     */
    private $textSlug;

    public function __construct(string $textSlug)
    {
        $this->textSlug = $textSlug;
    }

    public function getTextSlug(): string
    {
        return $this->textSlug;
    }
}
