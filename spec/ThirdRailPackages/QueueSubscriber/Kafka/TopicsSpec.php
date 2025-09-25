<?php

namespace spec\ThirdRailPackages\QueueSubscriber\Kafka;

use PhpSpec\Exception\Example\FailureException;
use PhpSpec\ObjectBehavior;
use ReflectionClass;
use ThirdRailPackages\QueueSubscriber\Kafka\Topics;

class TopicsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Topics::class);
        $this->shouldHaveConstants([
            'VSTP'   => 'VSTP_ALL',
            'TD'     => 'TD_ALL_SIG_AREA',
            'TRUST'  => 'TRAIN_MVT_ALL_TOC',
            'GEMINI' => 'prod-1033-Passenger-Train-Allocation-and-Consist-1_0',
        ]);
    }

    public function getMatchers(): array
    {
        return [
            'haveConstants' => function ($subject, $key) {
                $constants = (new ReflectionClass($subject))->getConstants();

                if ($constants !== $key) {
                    throw new FailureException('Class constants are not identical');
                }

                return true;
            }
        ];
    }
}
