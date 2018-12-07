<?php

namespace DivineOmega\GitHubStatusApi;

use Carbon\Carbon;
use DivineOmega\GitHubStatusApi\Enums\GitHubStatus;
use IvoPetkov\HTML5DOMDocument;

class Client
{
    const GITHUB_STATUS_URL = 'https://status.github.com/messages';

    const CLASS_TO_STATUS_MAP = [
        'good' => GitHubStatus::GOOD,
        'major' => GitHubStatus::MAJOR,
        'minor' => GitHubStatus::MINOR,
    ];

    public function status(Carbon $datetime)
    {
        $dom = $this->getDomDocument($datetime);

        $timeElements = $dom->querySelectorAll('time');

        /** @var HTML5DOMDocument $timeElement*/
        foreach($timeElements as $timeElement) {

            $timeElementDatetime = Carbon::parse($timeElement->getAttribute('datetime'));

            if ($datetime >= $timeElementDatetime) {

                $class = $timeElement->parentNode->attributes->getNamedItem('class')->textContent;
                $classParts = explode(' ', $class);

                foreach($classParts as $classPart) {

                    if (array_key_exists($classPart, self::CLASS_TO_STATUS_MAP)) {
                        return self::CLASS_TO_STATUS_MAP[$classPart];
                    }

                }

                return GitHubStatus::UNKNOWN;
            }

        }
    }

    private function getDomDocument(Carbon $datetime)
    {
        $url = self::GITHUB_STATUS_URL.'/'.$datetime->format('Y-m-d');
        $html = file_get_contents($url);

        $dom = new HTML5DOMDocument();
        $dom->loadHTML($html);

        return $dom;
    }
}