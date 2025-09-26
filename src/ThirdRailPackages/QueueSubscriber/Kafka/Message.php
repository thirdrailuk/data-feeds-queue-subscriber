<?php

namespace ThirdRailPackages\QueueSubscriber\Kafka;

use ThirdRailPackages\QueueSubscriber\MessageInterface;

class Message implements MessageInterface
{
    public function __construct(
        private \RdKafka\Message $frame
    ) {
    }

    /**
     * @return array<string, int|string|null>
     */
    public function getHeaders(): array
    {
        $headers              = $this->frame->headers;
        $headers['timestamp'] = $this->frame->timestamp;

        return $headers;
    }

    public function getBody(): ?string
    {
        return $this->frame->payload;
    }
}
