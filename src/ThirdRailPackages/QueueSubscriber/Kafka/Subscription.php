<?php

namespace ThirdRailPackages\QueueSubscriber\Kafka;

use RdKafka\Conf;
use RdKafka\KafkaConsumer;
use Throwable;

class Subscription
{
    public bool $looping = false;

    public function __construct(
        private readonly Conf $client
    ) {
    }

    public function consume(string $topic, callable $callback): void
    {
        $consumer = new KafkaConsumer(
            $this->client
        );
        $consumer->subscribe([$topic]);

        $this->looping = true;

        // @phpstan-ignore-next-line while.alwaysTrue
        while ($this->looping) {
            try {
                $message = $consumer->consume(120 * 1000); // 120 seconds
                $callback(new Message($message));
            } catch (Throwable $e) {
                $this->looping = false;

                throw $e;
            }
        }
    }
}
