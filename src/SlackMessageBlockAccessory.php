<?php

namespace AmirIskander\SlackNotifier;

/**
 * Class SlackMessageBlockAccessory
 */
class SlackMessageBlockAccessory
{
    public const ALLOWED_TYPES = ['image', 'button'];

    use Common;

    /**
     * @var string
     */
    private $type;

    /**
     * @var SlackMessageBlockText
     */
    private $text;

    /**
     * @var string
     */
    private $altText;

    /**
     * @var string
     */
    private $imageUrl;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $actionId;

    /**
     * SlackMessageBlockText constructor.
     *
     * @param string $type
     *
     * @throws Exception
     */
    public function __construct(string $type)
    {
        $this->setType($type);
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
    public function setType(string $type): SlackMessageBlockAccessory
    {
        if (!in_array($type, self::ALLOWED_TYPES)) {
            throw new Exception("Text type is now allowed. Only allowed types are " . implode(', ', self::ALLOWED_TYPES));
        }
        $this->type = $type;
        if ($type == 'button') {
            $this->setActionId('button-action');
        }
        return $this;
    }

    /**
     * @return SlackMessageBlockText
     */
    public function getText(): SlackMessageBlockText
    {
        return $this->text;
    }

    /**
     * @param SlackMessageBlockText $text
     *
     * @return SlackMessageBlockAccessory
     */
    public function setText(SlackMessageBlockText $text): SlackMessageBlockAccessory
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getAltText(): string
    {
        return $this->altText;
    }

    /**
     * @param string $altText
     *
     * @return $this
     */
    public function setAltText(string $altText): SlackMessageBlockAccessory
    {
        $this->altText = $altText;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     *
     * @return $this
     */
    public function setImageUrl(string $imageUrl): SlackMessageBlockAccessory
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     *
     * @return SlackMessageBlockAccessory
     */
    public function setValue($value): SlackMessageBlockAccessory
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     *
     * @return SlackMessageBlockAccessory
     */
    public function setUrl($url): SlackMessageBlockAccessory
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActionId()
    {
        return $this->actionId;
    }

    /**
     * @param mixed $actionId
     *
     * @return SlackMessageBlockAccessory
     */
    public function setActionId($actionId): SlackMessageBlockAccessory
    {
        $this->actionId = $actionId;
        return $this;
    }
}
