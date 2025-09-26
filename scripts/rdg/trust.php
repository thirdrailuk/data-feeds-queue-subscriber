<?php

use ThirdRailPackages\QueueSubscriber\MessageInterface;

include __DIR__ . '/../include.php';

try {
    rdg_client(rdg_group_id_trust())->consume(
        'TRAIN_MVT_ALL_TOC',
        function (MessageInterface $message) {
            echo $message->getBody() . PHP_EOL;
        }
    );
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    exit(1);
}
