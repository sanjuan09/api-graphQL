<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;


class TicketUpdate extends Mutation
{
    protected $attributes = [
        'name' => 'EditarTicket',
        'description' => 'Mutation para editar ticket'
    ];

    public function type(): Type
    {
        return GraphQL::type('Tickets');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type'=> Type::id(),
                'descripction' => "id autoincremental de tickets"
            ],
            'usuario' => [
                'type' => Type::string(),
                'description' => "Usuario ticket"
            ],
            'estatus' => [
                'type' => Type::string(),
                'description' => "Estado ticket"
            ],

        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $ticket = \App\Models\Tickets::findOrFail($args['id']);
        $ticket->update($args);
        return $ticket->refresh();
    }
}
