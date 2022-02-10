<?php

namespace AmirIskander\SlackNotifier;

class MarkdownText extends Text
{
    public function __construct(string $text)
    {
        parent::__construct('mrkdwn', $text);
    }
}
