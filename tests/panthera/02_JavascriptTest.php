<?php

namespace App\Tests\Panthera;

use Symfony\Component\Panther\PantherTestCase;

class JavascriptTest extends PantherTestCase
{

    /**
     * @group Functionnal
     */
	public function testJavascript()
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/news/symfony-unitary-testing');
        
        sleep(5);//juste pour demo
        $client->executeScript('alert(\'Execution de code Javascript\');');
        sleep(5);//juste pour demo
        $this->assertSame('Les tests unitaires avec Symfony 4', $crawler->filter('h1')->text());
    }
}
