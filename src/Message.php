<?php

namespace AmirIskander\SlackNotifier;

class Message
{
    use Common;

    /**
     * @var array
     */
    private $blocks;

    /**
     * @var string
     */
    private $webhookUrl;

    /**
     * SlackMessage constructor.
     */
    public function __construct()
    {
        $this->blocks  = [];
    }

    /**
     * @return array
     */
    public function getBlocks(): array
    {
        return $this->blocks;
    }

    /**
     * @param array $blocks
     *
     * @return Message
     */
    public function setBlocks(array $blocks): Message
    {
        $this->blocks = $blocks;
        return $this;
    }

    /**
     * @param Block $block
     *
     * @return $this
     */
    public function addBlock(Block $block)
    {
        $this->blocks[] = $block;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebhookUrl(): string
    {
        return $this->webhookUrl;
    }

    /**
     * @param string $webhookUrl
     *
     * @return Message
     */
    public function setWebhookUrl(string $webhookUrl): Message
    {
        $this->webhookUrl = $webhookUrl;
        return $this;
    }

    /**
     * @param string $webhookUrl
     *
     * @return array
     */
    public function send(string $webhookUrl)
    {
        $body = json_encode($this->getSnakeCaseArray(), JSON_UNESCAPED_SLASHES);

        // Create CURL HTTP POST request
        $ch = curl_init($webhookUrl);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept:  application/json',
            'Content-Type: application/json',
            'Content-Length: ' . strlen($body)
        ]);

        // Send request and get response and status code
        $response = curl_exec($ch);
        $http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ['response' => $response, 'status_code' => $http_status_code];
    }
}
