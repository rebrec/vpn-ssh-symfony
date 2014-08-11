<?php

namespace Rebrec\Bundle\VPNSSHBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClientControllerTest extends WebTestCase
{
    public function testRegister()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/register/{id}');
    }

    public function testSettings()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/settings');
    }

}
