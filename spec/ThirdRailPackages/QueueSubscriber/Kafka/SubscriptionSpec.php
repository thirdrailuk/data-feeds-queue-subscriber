<?php

namespace spec\ThirdRailPackages\QueueSubscriber\Kafka;

use PhpSpec\ObjectBehavior;
use ThirdRailPackages\QueueSubscriber\Kafka\Subscription;

class SubscriptionSpec extends ObjectBehavior
{
    function it_is_initializable(\RdKafka\Conf $client)
    {
        $this->beConstructedWith($client);
        $this->shouldHaveType(Subscription::class);
    }
}
