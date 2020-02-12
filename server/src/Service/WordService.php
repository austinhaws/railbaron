<?php

namespace RailBaron\Service;

use RailBaron\Enum\Environment;

class WordService extends BaseService
{
    public function getWords($numWords)
    {
        $url = getenv(Environment::RANDOM_WORD_API_URL) .
            '?key=' . getenv(Environment::RANDOM_WORD_API_KEY) .
            '&number=' . $numWords .
            '&swear=0';

        $words = $this->context->services->curlService->curl($url);

        return join(' ', json_decode($words));
    }
}
