<?php

use Carbon\Carbon;
use DivineOmega\GitHubStatusApi\Client;

require_once 'vendor/autoload.php';

$status = (new Client())->status(Carbon::now());

var_dump($status);