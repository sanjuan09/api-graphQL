<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class TicketDelete extends Mutation
{
    protected $attributes = [
        'name' => 'BorrarTicket',
        'description' => 'Mutation para borrar ticket'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'type'=> Type::id(),
                'descripction' => "id autoincremental de tickets"
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $ticket = \App\Models\Tickets::findOrFail($args['id']);
        return $ticket->delete();
    }
}
