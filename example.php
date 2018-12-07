<?php

use Carbon\Carbon;
use DivineOmega\GitHubStatusApi\Client;

require_once 'vendor/autoload.php';

$client = new Client();
$status = $client->status(Carbon::parse('2018-12-06 17:00'));

var_dump($status);