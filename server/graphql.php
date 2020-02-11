<?php
require __DIR__ . '/vendor/autoload.php';

use GraphQL\Error\Debug;
use RailBaron\Context\Context;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$context = Context::instance();

if (!$context->services->environmentService->isProduction()) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    set_error_handler(function($severity, $message, $file, $line) use (&$phpErrors) {
        throw new ErrorException($message, 0, $severity, $file, $line);
    });
    $debug = Debug::INCLUDE_DEBUG_MESSAGE | Debug::INCLUDE_TRACE;
}

echo $context->services->graphQLService->run();
