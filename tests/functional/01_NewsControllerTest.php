<?php

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NewsFunctionalControllerTest extends WebTestCase
{
    /**
     * @group Functionnal
     */
    public function testNews()
    {
        // Instantiation du client
		$client = static::createClient();
		// Requête HTTP GET sur /
        $crawler = $client->request('GET', '/');
        // On parse et vérifie qu'il y a bien deux "news"
        $this->assertCount(2, $crawler->filter('h1'));
        // On vérifie que les deux articles ont bien les slugs suivants
        $this->assertSame([
            'symfony-functional-testing',
            'symfony-unitary-testing'
        ], $crawler->filter('article')->extract('id'));
        // On récupère le lien et on clique dessus
        $link = $crawler->selectLink('Les tests unitaires avec Symfony 4')->link();
        $crawler = $client->click($link);
        // On vérifie que l'article sur lequel on a été redirigé correspond bien.
        $this->assertSame('Les tests unitaires avec Symfony 4', $crawler->filter('h1')->text());
    }
    
}
