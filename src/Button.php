<?php

namespace AmirIskander\SlackNotifier;

class Button extends Accessory
{
    public function __construct(string $url, string $text, ?string $alt = null)
    {
        parent::__construct('button');
        $this
            ->setUrl($url)
            ->setText(new PlainText($text))
            ->setAltText($alt)
        ;
    }
}
