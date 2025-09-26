<?php

namespace spec\ThirdRailPackages\QueueSubscriber\Kafka;

use PhpSpec\ObjectBehavior;
use ThirdRailPackages\QueueSubscriber\Kafka\Subscription;

class KafkaClientFactorySpec extends ObjectBehavior
{
    const BOOTSTRAP_SERVERS = 'fake-fake01.europe-west2.gcp.confluent.cloud:9092';
    const SECURITY_GROUP = 'SC-secret-secret-secret';
    const PASSWORD = 'secret';
    const USERNAME = 'fake-username';

    function it_is_initializable()
    {
        $this->beConstructedThroughMake(
            self::BOOTSTRAP_SERVERS,
            self::USERNAME,
            self::PASSWORD,
            self::SECURITY_GROUP
        );
        $this->shouldHaveType(Subscription::class);
    }
}
