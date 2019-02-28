<?php

namespace App\Repository;

class NewsRepository
{
    private const NEWS = [
        'symfony-functional-testing' => [
            'slug' => 'symfony-functional-testing',
            'title' => 'Les tests fonctionnels avec Symfony 4',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.',
        ], 
        'symfony-unitary-testing' => [
            'slug' => 'symfony-unitary-testing',
            'title' => 'Les tests unitaires avec Symfony 4',
            'body' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.'
        ],
    ];

    public function findAll(): iterable
    {
        return array_values(self::NEWS);
    }

    public function findOneBySlug(string $slug): ?array
    {
        return self::NEWS[$slug] ?? null;
    }
}