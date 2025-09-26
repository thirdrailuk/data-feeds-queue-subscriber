<?php

use ThirdRailPackages\QueueSubscriber\MessageInterface;

include __DIR__ . '/../include.php';

try {
    rdg_client(rdg_group_id_vstp())->consume(
        'VSTP_ALL',
        function (MessageInterface $message) {
            echo $message->getBody() . PHP_EOL;
        }
    );
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    exit(1);
}
