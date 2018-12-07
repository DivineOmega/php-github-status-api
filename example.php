<?php

use Carbon\Carbon;
use DivineOmega\GitHubStatusApi\Client;
use DivineOmega\GitHubStatusApi\Enums\GitHubStatus;

require_once 'vendor/autoload.php';

$status = (new Client())->status();

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
