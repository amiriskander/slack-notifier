<?php

namespace AmirIskander\SlackNotifier;

class SlackMessage
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
     * @return SlackMessage
     */
    public function setBlocks(array $blocks): SlackMessage
    {
        $this->blocks = $blocks;
        return $this;
    }

    /**
     * @param SlackMessageBlock $block
     *
     * @return $this
     */
    public function addBlock(SlackMessageBlock $block)
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
     * @return SlackMessage
     */
    public function setWebhookUrl(string $webhookUrl): SlackMessage
    {
        $this->webhookUrl = $webhookUrl;
        return $this;
    }

    /**
     * @param $webhookUrl
     *
     * @return array
     */
    public function send($webhookUrl)
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
