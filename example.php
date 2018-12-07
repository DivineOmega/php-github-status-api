<?php

use Carbon\Carbon;
use DivineOmega\GitHubStatusApi\Client;
use DivineOmega\GitHubStatusApi\Enums\GitHubStatus;

require_once 'vendor/autoload.php';

$status    = (new Client())->status();
// $status = (new Client())->status(Carbon::parse('2018-12-06 17:00'));

switch ($status) {
    case GitHubStatus::GOOD:
        echo 'GitHub is up! No issues reported.';
        break;

    case GitHubStatus::MINOR:
        echo 'GitHub is experiencing minor issues.';
        break;

    case GitHubStatus::MAJOR:
        echo 'GitHub is experiencing major issues.';
        break;

    case GitHubStatus::UNKNOWN:
        echo 'Unable to determine GitHub\'s status.';
        break;
}

echo PHP_EOL;
