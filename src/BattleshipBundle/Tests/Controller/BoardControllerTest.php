<?php

namespace BattleshipBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BoardControllerTest extends WebTestCase
{
    public function testShowboard1()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/games/1');
    }

    public function testShowboard2()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/games/2');
    }

}
