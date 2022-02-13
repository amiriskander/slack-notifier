<?php

namespace AmirIskander\SlackNotifier;

class Image extends Accessory
{
    public function __construct(string $url, ?string $alt = null)
    {
        parent::__construct('image');
        $this
            ->setImageUrl($url)
            ->setAltText($alt)
        ;
    }
}
