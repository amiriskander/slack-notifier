<?php

namespace AmirIskander\SlackNotifier;

/**
 * Class SlackMessageBlock
 */
class Block
{
    public const ALLOWED_TYPES = ['section', 'divider'];

    use Common;

    /**
     * @var string
     */
    private $type;

    /**
     * @var Text
     */
    private $text;

    /**
     * @var Text[]
     */
    private $fields;

    /**
     * @var Accessory
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
    public function setType(string $type): Block
    {
        if (!in_array($type, self::ALLOWED_TYPES)) {
            throw new Exception("Block type is now allowed. Only allowed types are " . implode(', ', self::ALLOWED_TYPES));
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @return Text
     */
    public function getText(): Text
    {
        return $this->text;
    }

    /**
     * @param Text $text
     *
     * @return Block
     */
    public function setText(Text $text): Block
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return Text[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param Text[] $fields
     *
     * @return Block
     */
    public function setFields(array $fields): Block
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param Text $field
     *
     * @return $this
     */
    public function addField(Text $field): Block
    {
        $this->fields[] = $field;
        return $this;
    }

    /**
     * @return Accessory
     */
    public function getAccessory(): Accessory
    {
        return $this->accessory;
    }

    /**
     * @param Accessory $accessory
     *
     * @return Block
     */
    public function setAccessory(Accessory $accessory): Block
    {
        $this->accessory = $accessory;
        return $this;
    }
}
