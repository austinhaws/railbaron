<?php
require __DIR__ . '/vendor/autoload.php';

use GraphQL\Error\Debug;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use RailBaron\Context\Context;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (0 !== strcmp(getenv('production'), 'production')) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    set_error_handler(function($severity, $message, $file, $line) use (&$phpErrors) {
        throw new ErrorException($message, 0, $severity, $file, $line);
    });
    $debug = Debug::INCLUDE_DEBUG_MESSAGE | Debug::INCLUDE_TRACE;
}

// use RailBaron\ParsePayouts\ParsePayouts;
// (new ParsePayouts())->run();
// exit('just parsing for now');

// Parse incoming query and variables
if (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
    $raw = file_get_contents('php://input') ?: '';
    $data = json_decode($raw, true) ?: [];
} else {
    $data = $_REQUEST;
}

$data += ['query' => null, 'variables' => null];

if (null === $data['query']) {
    throw new ErrorException('No query specified');
}

// GraphQL schema to be passed to query executor:
$context = Context::instance();
$schema = new Schema([
    'query' => $context->typeRegistry->queryType(),
]);

$result = GraphQL::executeQuery(
    $schema,
    $data['query'],
    null,
    $context,
    (array)$data['variables']
);

echo json_encode($result->toArray(0 !== strcmp(getenv('production'), 'production')));
