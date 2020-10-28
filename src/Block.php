<?php

namespace AmirIskander\SlackNotifier;

/**
 * Class SlackMessageBlock
 */
class SlackMessageBlock
{
    public const ALLOWED_TYPES = ['section', 'divider'];

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
     * @var SlackMessageBlockText[]
     */
    private $fields;

    /**
     * @var SlackMessageBlockAccessory
     */
    private $accessory;

    /**
     * SlackMessageBlock constructor.
     *
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
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
    public function setType(string $type): SlackMessageBlock
    {
        if (!in_array($type, self::ALLOWED_TYPES)) {
            throw new Exception("Block type is now allowed. Only allowed types are " . implode(', ', self::ALLOWED_TYPES));
        }
        $this->type = $type;
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
     * @return SlackMessageBlock
     */
    public function setText(SlackMessageBlockText $text): SlackMessageBlock
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return SlackMessageBlockText[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param SlackMessageBlockText[] $fields
     *
     * @return SlackMessageBlock
     */
    public function setFields(array $fields): SlackMessageBlock
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param SlackMessageBlockText $field
     *
     * @return $this
     */
    public function addField(SlackMessageBlockText $field): SlackMessageBlock
    {
        $this->fields[] = $field;
        return $this;
    }

    /**
     * @return SlackMessageBlockAccessory
     */
    public function getAccessory(): SlackMessageBlockAccessory
    {
        return $this->accessory;
    }

    /**
     * @param SlackMessageBlockAccessory $accessory
     *
     * @return SlackMessageBlock
     */
    public function setAccessory(SlackMessageBlockAccessory $accessory): SlackMessageBlock
    {
        $this->accessory = $accessory;
        return $this;
    }
}
