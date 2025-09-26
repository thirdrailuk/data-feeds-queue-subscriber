<?php

namespace ThirdRailPackages\QueueSubscriber\Kafka;

use RdKafka\Conf;

class KafkaClientFactory
{
    public static function make(
        string $bootstrapServers,
        string $username,
        string $password,
        string $groupId,
        bool $debug = false
    ): Subscription {
        $config = new Conf;

        $config->set('group.id', $groupId);
        $config->set('bootstrap.servers', $bootstrapServers);

        $config->set('security.protocol', 'SASL_SSL');
        $config->set('sasl.mechanism', 'PLAIN');
        $config->set('sasl.username', $username);
        $config->set('sasl.password', $password);

        $config->set('enable.auto.commit', 'true');

        $config->set('auto.offset.reset', 'earliest');

        if ($debug) {
            $config->set('debug', 'security,broker,protocol');
        }

        return new Subscription($config);
    }
}
