<?php


namespace App\Tests\Controller\Api;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class NewsControllerTest extends WebTestCase
{
    public function testPost(){
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $client = static::createClient();
        $client->request("POST", "/api/news.json", [
            "active" => 1,
            "name" => "Свежая новость",
            "anons" => "Анонс новости",
            "content" => "Контент новости",
        ]);
        $this->assertEquals($client->getResponse()->getStatusCode(), Response::HTTP_OK);
    }
}