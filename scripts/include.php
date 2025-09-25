<?php

include __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('UTC');

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

function rdg_bootstrap_servers()
{
    return getenv('RDG_BOOTSTRAP_SERVERS');
}

function rdg_username()
{
    return getenv('RDG_USERNAME');
}

function rdg_password()
{
    return getenv('RDG_PASSWORD');
}

function rdg_group_id_trust()
{
    return getenv('RDG_GROUP_ID_TRUST');
}

function rdg_group_id_td()
{
    return getenv('RDG_GROUP_ID_TD');
}

function rdg_group_id_vstp()
{
    return getenv('RDG_GROUP_ID_TD');
}

function rdg_group_id_gemini()
{
    return getenv('RDG_GROUP_ID_GEMINI');
}

function rdg_client(string $groupId): \ThirdRailPackages\QueueSubscriber\Kafka\Subscription {
    return \ThirdRailPackages\QueueSubscriber\Kafka\KafkaClientFactory::make(
        rdg_bootstrap_servers(),
        rdg_username(),
        rdg_password(),
        $groupId
    );
}

function milli_date(int $timestamp)
{
    return (new \DateTimeImmutable())
        ->setTimezone(new \DateTimeZone('Europe/London'))
        ->setTimestamp((int)($timestamp / 1000));
}

function hexagonal_to_binary($hexadecimal)
{
    return str_pad(base_convert($hexadecimal, 16, 2), 8, 0, STR_PAD_LEFT);
}

/**
 * @param $milliseconds
 *
 * @return DateTimeImmutable
 */
function datetime_from_milliseconds(int $milliseconds)
{
    $utcDate = DateTimeImmutable::createFromFormat(
        'U',
        $milliseconds,
        new DateTimeZone('UTC')
    );

    return $utcDate->setTimezone(new DateTimeZone('Europe/London'));
}

