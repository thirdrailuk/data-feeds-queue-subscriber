<?php

use ThirdRailPackages\QueueSubscriber\MessageInterface;

include __DIR__ . '/../include.php';

$tdArea = (isset($argv[1]) && $argv[1] !== null) ? $argv[1] : 'MS'; // Default to Manchester South
$messageType = (isset($argv[2]) && $argv[2] !== null) ? $argv[2] : 'SF'; // Default to Signalling Update

try {
    rdg_client(rdg_group_id_td())->consume(
        'TD_ALL_SIG_AREA',
        function (MessageInterface $message) use ($tdArea, $messageType) {
            $collection = json_decode($message->getBody(), true);

            $filtered = array_filter($collection,
                function ($item) use ($tdArea, $messageType) {
                    $data = array_shift($item);

                    return ($data['msg_type'] === $messageType
                        && $data['area_id'] === $tdArea);
                });

            if (count($filtered) > 0) {
                foreach ($filtered as $sf_message) {
                    $message = array_shift($sf_message);

                    echo sprintf(
                        'Time: "%s", Area: "%s", Address: "%s", State (HEX): "%s", Sate (Binary): "%s"',
                        milli_date($message['time'])->format('d/m/y H:i:s'),
                        $message['area_id'],
                        $message['address'],
                        $message['data'],
                        hexagonal_to_binary($message['data'])
                    ) . PHP_EOL;
                }
            }
        });
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    exit(1);
}
