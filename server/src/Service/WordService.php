<?php

namespace RailBaron\Service;

use RailBaron\Enum\WordType;

class WordService extends BaseService
{
    public function getWords($numWords)
    {
        $verb = $this->context->daos->wordDao->randomWord(WordType::VERB);
        $noun = $this->context->daos->wordDao->randomWord(WordType::NOUN);
        return "$verb $noun";
    }
}
