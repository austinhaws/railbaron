<?php

namespace RailBaron\Service;

use GraphQL\GraphQL;
use GraphQL\Type\Schema;

class GraphQLService extends BaseService
{
    const QUERY = 'query';
    const MUTATION = 'mutation';

    public function run()
    {
        // Parse incoming query and variables
        if (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
            $raw = file_get_contents('php://input') ?: '';
            $data = json_decode($raw, true) ?: [];
        } else {
            $data = $_REQUEST;
        }

        $data += [self::QUERY => null, 'variables' => null];

        if (null === $data[self::QUERY]) {
            throw new \RuntimeException('No query specified');
        }

        $result = GraphQL::executeQuery(
            new Schema([
                self::QUERY => $this->context->typeRegistry->queryType(),
                self::MUTATION => $this->context->typeRegistry->mutationType(),
            ]),
            $data[self::QUERY],
            null,
            $this->context,
            (array)$data['variables']
        );

        return json_encode($result->toArray(!$this->context->services->environmentService->isProduction()));
    }
}
