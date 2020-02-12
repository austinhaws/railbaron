<?php

namespace RailBaron\Enum;

abstract class Environment extends BaseEnum
{
    const APP_ENV = 'APP_ENV';
    const DB_HOST = 'DB_HOST';
    const DB_DATABASE = 'DB_DATABASE';
    const DB_USERNAME = 'DB_USERNAME';
    const DB_PASSWORD = 'DB_PASSWORD';
    const RANDOM_WORD_API_KEY = 'RANDOM_WORD_API_KEY';
    const RANDOM_WORD_API_URL = 'RANDOM_WORD_API_URL';
}
