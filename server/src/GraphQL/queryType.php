<?php
namespace RailBaron\GraphQL;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class QueryType {

	public static function objectType() {
		return new ObjectType([
			'name' => 'Query',
			'fields' => [
				'echo' => [
					'type' => Type::string(),
					'args' => [
						'message' => Type::nonNull(Type::string()),
					],
					'resolve' => function ($root, $args) {
						return $root['prefix'] . $args['message'];
					}
				],
			],
		]);
	}
}
