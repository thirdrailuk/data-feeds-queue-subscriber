<?php

namespace ThirdRailPackages\QueueSubscriber;

interface ConsumerInterface
{
    public function consume(string $topic, callable $callback): void;
}
