<?php

namespace AmirIskander\SlackNotifier;

/**
 * Class SlackMessageBlockText
 */
class Text
{
    public const ALLOWED_TYPES = ['plain_text', 'mrkdwn'];

    use Common;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $text;

    /**
     * @var bool
     */
    private $emoji;

    /**
     * SlackMessageBlockText constructor.
     *
     * @param string $type
     * @param string $text
     *
     * @throws Exception
     */
    public function __construct(string $type, string $text)
    {
        $this->setType($type);
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     * @throws Exception
     */
    public function setType(string $type): Text
    {
        if (!in_array($type, self::ALLOWED_TYPES)) {
            throw new Exception("Text type is now allowed. Only allowed types are " . implode(', ', self::ALLOWED_TYPES));
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return Text
     */
    public function setText(string $text): Text
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasEmoji(): bool
    {
        return $this->emoji;
    }

    /**
     * @param bool $emoji
     *
     * @return Text
     */
    public function setHasEmoji(bool $emoji): Text
    {
        $this->emoji = $emoji;
        return $this;
    }
}
