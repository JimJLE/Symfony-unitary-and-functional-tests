<?php

namespace App\Tests\Panthera;

use Symfony\Component\Panther\PantherTestCase;

class NewsControllerTest extends PantherTestCase
{
    /**
     * @group Functionnal
     */
    public function testNews()
    {
        // Instantiation du client
		$client = static::createPantherClient();
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
    
    /**
     * @group Functionnal
     */
	public function testComments()
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/news/symfony-unitary-testing');
        
        sleep(5);//juste pour demo
        $client->waitFor('#post-comment'); // On attends que le formulaire apparaisse
        $form = $crawler->filter('#post-comment')->form(['new-comment' => 'Ceci est un texte saisi par un test fonctionnel !']);

        // On prends une capture d'écran
		$today = new \DateTime("now", new \DateTimeZone("Europe/Paris"));
		$date = $today->format("Ymd");
		$client->takeScreenshot($date.'_testComments.png');
        sleep(5);//juste pour demo
        
        // On vérifie que le contenu du textarea correspond bien à l'attendu.
        // Aucun js ne l'a modifié...
        $this->assertSame('Ceci est un texte saisi par un test fonctionnel !', $crawler->filter('#new-comment')->getAttribute('value'));
    }

}
