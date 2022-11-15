<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;


class TicketsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Tickets',
        'description' => 'Definicion de elementos de tikets ',
        'model' => \App\Models\Tickets::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type'=> Type::id(),
                'descripction' => "id autoincremental de tickets"
            ],
            'usuario' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "Usuario ticket"
            ],
            'estatus' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "estado ticket"
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => "fecha de creacion del ticket"
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => "Fecha de actualizacion del ticket"
            ]

        ];
    }
}
