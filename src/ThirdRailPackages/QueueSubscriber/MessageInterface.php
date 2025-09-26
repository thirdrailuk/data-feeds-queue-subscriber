<?php

namespace ThirdRailPackages\QueueSubscriber;

interface MessageInterface
{
    /**
     * @return array<string, int|string|null>
     */
    public function getHeaders(): array;

    public function getBody(): ?string;
}
