<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BaseControllerControllerTest extends WebTestCase
{
    public function testBase()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
    }

}
