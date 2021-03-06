# PHP GitHub Status API

[![Build Status](https://travis-ci.com/DivineOmega/php-github-status-api.svg?branch=master)](https://travis-ci.com/DivineOmega/php-github-status-api)

---

⚠️ **Warning:** As of 11th December 2018, GitHub have deprecated the status page that this package parses, so current status information may not be up-to-date. More information: https://blog.github.com/2018-12-11-introducing-the-new-github-status-site/

---

This package provides a way to programmatically determine if GitHub is working 
well, or experiencing issues.
Both the current status and historical statuses can be looked up by date.

<p align="center">
    <img height="500" src="https://user-images.githubusercontent.com/650645/49678157-77f06f00-fa7a-11e8-857c-0586751a3540.png" />
</p>

<p align="center">
    <a href="https://packagist.org/packages/divineomega/github-status-api/stats">
        <img src="https://img.shields.io/packagist/dt/divineomega/github-status-api.svg" />
    </a>
</p>

## Installation

To install PHP GitHub Status API, just run the following composer command.

```bash
composer require divineomega/github-status-api
```

Remember to include the `vendor/autoload.php` file if your framework does not 
do this for you.

## Usage

To check the state of GitHub currently, simply create a new `Client` object,
and call its `status` method. You can optionally pass a `Carbon` date object
to the `status` method to retrieve a historical status.

```php
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
``` 
