<?php

namespace ThirdRailPackages\QueueSubscriber;

interface MessageInterface
{
    /**
     * @return array<string>
     */
    public function getHeaders(): array;

    /**
     * @return false|string
     */
    public function getBody();
}
