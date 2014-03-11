<?php

namespace LoLTool\Bundle\LoLToolBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ChampionControllerTest extends WebTestCase
{
    public function testUpdatechampiondata()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'yes');
    }

}
