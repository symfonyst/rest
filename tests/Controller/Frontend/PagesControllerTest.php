<?php

namespace App\Tests\Controller\Frontend;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class PagesControllerTest extends WebTestCase
{
    public function testMainPage(){
        $client = self::createClient();
        $client->request("GET", "/");
        $this->assertTrue($client->getResponse()->getStatusCode() == Response::HTTP_OK);
    }
}