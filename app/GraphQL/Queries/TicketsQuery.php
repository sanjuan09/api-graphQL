<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;


class TicketsQuery extends Query
{
    protected $attributes = [
        'name' => 'tickets',
        'description' => 'Query de todos los tickets paginados por 5 '
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQl::type('Tickets'));
        //GraphQL::paginate('Tickets');
    }

    public function args(): array
    {
        return [
            'limit' => [
                'type' => Type::int(),
                'defaultValue' => 10,
            ],
            'page' => [
                'type' => Type::int(),
                'defaultValue' => 1,
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return \App\Models\Tickets::paginate($args['limit'], ['*'], 'page', $args['page']);
    }
}
