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
     * @return array|string[]
     */
    public function getHeaders(): array
    {
        return $this->frame->headers;
    }

    public function getBody(): ?string
    {
        return $this->frame->payload;
    }
}
