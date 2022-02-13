<?php

namespace AmirIskander\SlackNotifier;

class PlainText extends Text
{
    public function __construct(string $text)
    {
        parent::__construct('plain_text', $text);
    }
}
