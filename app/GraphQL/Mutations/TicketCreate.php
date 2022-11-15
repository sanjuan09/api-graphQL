<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;


class TicketCreate extends Mutation
{
    protected $attributes = [
        'name' => 'CrearTicket',
        'description' => 'Mutation para crear ticket'
    ];

    public function type(): Type
    {
        return GraphQL::type('Tickets');
    }

    public function args(): array
    {
        return [
            'usuario' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "Usuario ticket"
            ],
            'estatus' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "Estado ticket solo se aceptan los valores (abierto/cerrado)"
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return \App\Models\Tickets::create($args);
    }
    
}
